
<?php include 'section/header.php'; ?>

<?php
include 'db_connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $truckId = (int)$_GET['id'];
    
    // Query to get truck details and all associated images
    $sql = "SELECT t.id, t.truck_code,t.truck_price, t.truck_name, t.truck_link, t.truck_color, t.year_model, t.chassis_num,
              t.engine_num,
              b.brand_name, tt.truck_type, ts.status AS availability_status,
              (SELECT GROUP_CONCAT(p.pictures) FROM tbl_truck_pictures p WHERE p.truckid = t.id AND p.statid != '4') AS image_paths,
              (SELECT GROUP_CONCAT(td.details SEPARATOR '\n') FROM tbl_truck_details td WHERE td.truckid = t.id) AS details
            FROM tbl_trucks t
            LEFT JOIN tbl_brand_logo b ON b.brand_name = t.truck_name
            LEFT JOIN tbl_truck_type tt ON t.typeid = tt.id
            LEFT JOIN tbl_truck_status ts ON t.statid = ts.id
            WHERE t.id = ?";
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing query: " . $conn->error);
    }
    
    $stmt->bind_param("i", $truckId);
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $truck = $result->fetch_assoc();
        $truck_link = htmlspecialchars($truck['truck_link']);
        // Convert image paths to array
        $truck['images'] = !empty($truck['image_paths']) ? explode(',', $truck['image_paths']) : [];
    } else {
        die("Truck not found.");
    }
} else {
    die("Invalid truck ID.");
}
?>

<body class="index-page">
  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.php">
      <img src="assets/img/KANSAI.png" style="width:250px;height: 70px;margin-left: 10px;" alt="Kansai Ueno Logo" >
    </a>
  
        <nav id="navmenu" class="navmenu">
          <ul>
            
            <button class="dark-mode-toggle ms-3" aria-label="Toggle dark mode">
              <i class="bi bi-moon-fill light-icon" style="color: black;"></i>
              <i class="bi bi-sun-fill dark-icon"></i>
            </button>
          </ul>
          <!-- Dark mode toggle added to navmenu -->
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
  
      </div>
    </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1>Truck Details</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->


    <section id="project-details" class="project-details section">
  <div class="vehicle-details-modern">
    <!-- Header Section -->
    <div class="vehicle-header-modern">
      <a href="index.php#projects" class="back-button-modern">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 18L9 12L15 6" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Back</span>
      </a>
      
      <div class="vehicle-title-modern">
        <h1><?php echo htmlspecialchars($truck['truck_type']); ?></h1>
        <div class="price-availability-modern">
          <span class="price-modern fw-bold text-success">₱<?php echo htmlspecialchars($truck['truck_price']); ?></span>
          <span class="availability-badge-modern"><?php echo htmlspecialchars($truck['availability_status']); ?></span>
        </div>
      </div>
    </div>
  
   <!-- Gallery Section -->
<div class="gallery-container-modern">
  <div class="main-image-container-modern">
    <div class="slider-wrapper">
      <?php if (!empty($truck['images'])) : ?>
        <?php foreach ($truck['images'] as $index => $image): ?>
          <?php 
          // Ensure proper path formatting
          $imagePath = '../admin/' . ltrim($image, '/');
          ?>
          <img src="<?php echo htmlspecialchars($imagePath); ?>" 
               alt="<?php echo htmlspecialchars($truck['truck_name']); ?>" 
               class="<?php echo $index === 0 ? 'active-slide' : ''; ?>">
        <?php endforeach; ?>
      <?php else: ?>
        <div class="no-image-placeholder">
          <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 16L8.586 11.414C8.961 11.039 9.47 10.828 10 10.828C10.53 10.828 11.039 11.039 11.414 11.414L16 16M14 14L15.586 12.414C15.961 12.039 16.47 11.828 17 11.828C17.53 11.828 18.039 12.039 18.414 12.414L20 14M14 8H14.01M6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20Z" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <p>No images available for this truck</p>
        </div>
      <?php endif; ?>
    </div>
    
    <?php if (!empty($truck['images'])) : ?>
      <div class="slider-controls">
        <button class="slider-arrow prev-arrow">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 18L9 12L15 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <button class="slider-arrow next-arrow">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
      
      <div class="slider-pagination">
        <?php foreach ($truck['images'] as $index => $image): ?>
          <span class="dot <?php echo $index === 0 ? 'active' : ''; ?>"></span>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
  
  <?php if (!empty($truck['images'])) : ?>
    <div class="thumbnail-strip-modern">
      <?php foreach ($truck['images'] as $index => $image): ?>
        <?php $imagePath = '../admin/' . ltrim($image, '/'); ?>
        <div class="thumbnail-modern <?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
          <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Thumbnail <?php echo $index + 1; ?>">
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
  
    <!-- Details Tabs -->
    <div class="details-tabs-modern">
      <nav class="tab-nav-modern">
        <button class="tab-link-modern active" data-tab="overview">Overview</button>
        <button class="tab-link-modern" data-tab="specifications">Specifications</button>
        <button class="tab-link-modern" data-tab="contact">Contact</button>
      </nav>
      
      <div class="tab-content-modern">
        <!-- Overview Tab -->
        <div id="overview" class="tab-pane-modern active">
          <div class="specs-grid-modern">
            <div class="specs-card-modern">
              <div class="specs-header-modern">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12 16V12" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12 8H12.01" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3>Basic Information</h3>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Truck Code</span>
                <span class="specs-value-modern"><?php echo htmlspecialchars($truck['truck_code']); ?></span>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Year Model</span>
                <span class="specs-value-modern"><?php echo htmlspecialchars($truck['year_model']); ?></span>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Color</span>
                <span class="specs-value-modern">
                  <span class="color-swatch-modern" style="background-color: <?php echo htmlspecialchars($truck['truck_color']); ?>;"></span>
                  <?php echo htmlspecialchars($truck['truck_color']); ?>
                </span>
              </div>
            </div>
            
            <div class="specs-card-modern">
              <div class="specs-header-modern">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 7H5C3.89543 7 3 7.89543 3 9V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V9C21 7.89543 20.1046 7 19 7Z" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16 5L12 2L8 5" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M8 19V5" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16 19V5" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3>Vehicle Overview</h3>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Brand</span>
                <span class="specs-value-modern"><?php echo htmlspecialchars($truck['brand_name']); ?></span>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Type</span>
                <span class="specs-value-modern"><?php echo htmlspecialchars($truck['truck_type']); ?></span>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Status</span>
                <span class="specs-value-modern"><?php echo htmlspecialchars($truck['availability_status']); ?></span>
              </div>
            </div>
          </div>
        </div>

        <div id="specifications" class="tab-pane-modern">
          <div class="specs-grid-modern">
            <div class="specs-card-modern">
              <div class="specs-header-modern">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 4H4C3.44772 4 3 4.44772 3 5V19C3 19.5523 3.44772 20 4 20H20C20.5523 20 21 19.5523 21 19V12" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15 4H21V10" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15 16H18" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M10 16H13" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15 12H18" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3>Engine Details</h3>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Chassis Number</span>
                <span class="specs-value-modern"><?php echo htmlspecialchars($truck['chassis_num']); ?></span>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Engine Number</span>
                <span class="specs-value-modern"><?php echo htmlspecialchars($truck['engine_num']); ?></span>
              </div>
              <div class="specs-row-modern">
                <span class="specs-label-modern">Transmission</span>
                <span class="specs-value-modern">Manual</span>
              </div>
            </div>

            <div class="specs-card-modern">
              <div class="specs-header-modern">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M21 12H18C16.3431 12 15 13.3431 15 15V20C15 21.6569 16.3431 23 18 23H21" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6 12H3C1.34315 12 0 13.3431 0 15V20C0 21.6569 1.34315 23 3 23H6" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M22 19H2" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3>Specifications Details</h3>
              </div>
              <div class="specs-row-modern">
                <ul class="details-list-modern" style="list-style: none; padding: 0;">
                  <?php 
                  // Assuming `details` contains bullet points separated by newlines
                  if (!empty($truck['details'])) {
                      $details = explode("\n", $truck['details']);
                      foreach ($details as $detail): 
                  ?>
                    <li class="detail-item-modern">
                      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="detail-icon-modern">
                        <path d="M9 12L11 14L15 10" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#10a729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                      <?php echo htmlspecialchars($detail); ?>
                    </li>
                  <?php 
                      endforeach; 
                  } else {
                      echo "<li class='detail-item-modern no-details'>No Specification details available.</li>";
                  }
                  ?>
                </ul>
              </div> </div>
          </div>
        </div>
        
        <!-- Features Tab -->
        <!-- Contact Tab -->
          <div id="contact" class="tab-pane-modern">
          <div class="contact-card-modern">
            <h3>Interested in this Vehicle?</h3>
            <p>Contact our sales team for more information.</p>
            <?php if (!empty($truck_link)): ?>
              <a href="<?php echo $truck_link; ?>" target="_blank" class="contact-button-modern bg-success"> 
                <i class="bi bi-chat-dots"></i>
                Inquire Now
              </a>
            <?php else: ?>
              <a href="javascript:void(0);" onclick="openContactTab(<?php echo $truck_id; ?>)" class="contact-button-modern bg-success">
                <i class="bi bi-chat-dots"></i>
                Inquire Now
              </a>
            <?php endif; ?>
          </div>
              </div>
              </div>
            </div>
          </div>
</section><!-- /Project Details Section -->
</div><!-- End Vehicle Details Modern -->
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 
  <?php include 'section/script.php'; ?>
  <?php include 'section/footer.php'; ?>
 
</body>

</html>