<?php
include 'db_connection.php';?>
<?php include 'section/header.php'; ?>

<body class="index-page">

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.php">
      <img src="assets/img/KANSAI.png" style="width:250px;height: 70px;margin-left: 10px;" alt="Kansai Ueno Logo" >
    </a>
    
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#recent-cars">Featured</a></li>
          <li><a href="#projects">Trucks Listing</a></li>
          <li><a href="#contact">Contact</a></li>
          <button class="dark-mode-toggle ms-3" aria-label="Toggle dark mode">
            <i class="bi bi-moon-fill light-icon" style="color: black;"></i>
            <i class="bi bi-sun-fill dark-icon"></i>
          </button>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main">

    <!-- Hero Section with Simple Parallax -->
    <section id="hero" class="hero parallax-section">
      <!-- Single parallax background image -->
      <div class="parallax-background" style="background-image: url('assets/img/hero-carousel/truck-fp.png');"></div>
      
      <!-- Dark overlay for better text readability -->
      <div class="parallax-overlay"></div>
      
      <!-- Your existing content -->
      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-8 text-center">
              <h3 style="color: white;">Moving the way you want.</h3>
              <p style="color: white;">We are one of the leading, trusted reliable sources of Japan used trucks in a dazzling array of sizes and chassis types.</p>
              <a href="#recent-cars" class="btn-get-started">Get Started</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero Section -->
     <!-- Add these styles to your existing CSS file or in a style tag in the header -->
     <!-- Recent Cars Section -->
    <section id="recent-cars" class="recent-cars section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Featured Trucks</h2>
        <p>Featured trucks built to deliver.</p>
      </div>
      <!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="cars-carousel-container" style="max-width:1600px; margin: auto;">
          <!-- Owl Carousel for Cars -->
          <div class="owl-carousel cars-carousel">
            <?php
            // Query to get 5 active trucks with their first image
            $sql = "SELECT t.id, t.truck_code, t.truck_name, t.truck_color, t.year_model, p.pictures AS image_path
                FROM tbl_trucks t 
                LEFT JOIN tbl_truck_pictures p ON t.id = p.truckid
                WHERE t.statid = '1'
                ORDER BY t.createddt DESC
                LIMIT 5";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $path = $row['image_path'];
                $image = "../admin/{$path}"; // Default fallback
                $truck_name = htmlspecialchars($row['truck_name'] ?? "Truck");
                $truck_code = htmlspecialchars($row['truck_code'] ?? "");
                $year_model = htmlspecialchars($row['year_model'] ?? "");
                $truck_color = htmlspecialchars($row['truck_color'] ?? "");
                ?>
                <!-- Dynamic Truck Item -->
                <div class="cars-item" style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); margin: 0;">
                  <a href="Trucks_description.php?id=<?php echo $row['id']; ?>" class="cars-link">
                    <div class="cars-image-container" style="position: relative; width: 100%; height: 100%; overflow: hidden;">
                      <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo $truck_name; ?>" class="cars-img" style="width: 100%; height: 100%; object-fit: cover;">
                      <div class="cars-details-overlay" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 15px; background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%); color: white; opacity: 1; transition: opacity 0.5s;">
                        <div class="cars-details" style="display: flex; flex-direction: column; gap: 8px; color:black; font-weight: bold;">
                          <span class="detail-item" style="display: flex; align-items: center; gap: 8px; font-size: 14px;"><i class="fas fa-tag"></i> <?php echo $truck_code; ?></span>
                          <span class="detail-item" style="display: flex; align-items: center; gap: 8px; font-size: 14px;"><i class="fas fa-calendar"></i> <?php echo $year_model; ?></span>
                          <span class="detail-item" style="display: flex; align-items: center; gap: 8px; font-size: 14px;"><i class="fas fa-palette"></i> <?php echo $truck_color; ?></span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <?php
              }
            } else {
              // Fallback to static content if no trucks found
              for ($i = 1; $i <= 5; $i++) {
                ?>
                <div class="cars-item" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); margin: 0;">
                  <a href="Truck_description.php?id=static-<?php echo $i; ?>" class="cars-link">
                    <div class="cars-image-container" style="position: relative; width: 100%; height: 400px; overflow: hidden;">
                      <img src="assets/img/projects/bnt-truck<?php echo $i; ?>.jpg" alt="Truck <?php echo $i; ?>" class="cars-img" style="width: 100%; height: 100%; object-fit: cover;">
                      <div class="cars-details-overlay" style="position: absolute; bottom: 0; left: 0; width: 100%; padding: 15px; background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%); color: white; opacity: 1; transition: opacity 0.5s;">
                        <div class="cars-details" style="display: flex; flex-direction: column; gap: 8px; color: black; font-weight: 600;">
                          <span class="detail-item" style="display: flex; align-items: center; gap: 8px; font-size: 18px;"><i class="fas fa-tag"></i> TRK-00<?php echo $i; ?></span>
                          <span class="detail-item" style="display: flex; align-items: center; gap: 8px; font-size: 12px;"><i class="fas fa-calendar"></i> 202<?php echo $i; ?></span>
                          <span class="detail-item" style="display: flex; align-items: center; gap: 8px; font-size: 12px;"><i class="fas fa-palette"></i> <?php echo ['Red', 'Blue', 'White', 'Black', 'Silver'][$i - 1]; ?></span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <?php
              }
            }
            ?>
          </div>
          <!-- End Owl Carousel -->
        </div>
      </div>
    </section>

    <!-- Partners Section -->
    <section id="partners" class="partners section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Trusted Partners</h2>
        <p>Your Dependable Allies on the Road.</p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row partners-logos" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-md-4 col-6 partner-logo">
            <div class="card-bg">
              <img src="assets/img/hitachilogo.png" alt="Hitachi Logo" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6 partner-logo">
            <div class="card-bg">
              <img src="assets/img/isuzulogo.png" alt="Isuzu Logo" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6 partner-logo">
            <div class="card-bg">
              <img src="assets/img/JCBlogo.png" alt="JCB Logo" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6 partner-logo">
            <div class="card-bg">
              <img src="assets/img/fusologo.png" alt="Fuso Logo" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6 partner-logo">
            <div class="card-bg">
              <img src="assets/img/komatsulogo.png" alt="Komatsu Logo" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-6 partner-logo">
            <div class="card-bg">
              <img src="assets/img/hinologo.png" alt="Hino Logo" class="img-fluid">
            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- End Partners Section -->

  <!-- Parallax Bridge Section -->
  <section class="parallax-bridge" data-aos="fade" data-aos-delay="200">
    <div class="container-fluid px-0">
      <div class="parallax-wrapper">
        <div class="parallax-bg" style="background-image: url('assets/img/bg.jpg');"></div>
        <div class="parallax-overlay"></div>
        <div class="parallax-content text-center">
          <h3>Built for Performance. Engineered for Excellence.</h3>
          <p>Discover our range of heavy-duty trucks designed to meet your toughest challenges</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Parallax Bridge -->
    <!-- Alt Services Section -->
   
    <?php
    $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

    // Filters
    $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : [];
    $categoryFilter = isset($_GET['category']) ? $_GET['category'] : [];
    $availabilityFilter = isset($_GET['availability']) ? $_GET['availability'] : [];
    $sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
    $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

    $where = [];

    // Search term handling
    if (!empty($searchTerm)) {
      $escapedSearch = $conn->real_escape_string($searchTerm);
      $where[] = "(t.truck_name LIKE '%$escapedSearch%' OR 
            t.truck_code LIKE '%$escapedSearch%' OR
            b.brand_name LIKE '%$escapedSearch%' OR
            tt.truck_type LIKE '%$escapedSearch%')";
    }

    // Brand filter
    if (!empty($brandFilter)) {
      $brandList = "'" . implode("','", array_map([$conn, 'real_escape_string'], $brandFilter)) . "'";
      $where[] = "b.brand_name IN ($brandList)";
    }

    // Category filter
    if (!empty($categoryFilter)) {
      $catList = "'" . implode("','", array_map([$conn, 'real_escape_string'], $categoryFilter)) . "'";
      $where[] = "tt.truck_type IN ($catList)";
    }

    // Availability filter
    if (!empty($availabilityFilter)) {
      $statusList = "'" . implode("','", array_map([$conn, 'real_escape_string'], $availabilityFilter)) . "'";
      $where[] = "ts.statid IN ($statusList)";
    }

    $condition = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

    // Sorting
    switch ($sortBy) {
      case "price_asc":
        $orderClause = "ORDER BY t.truck_price ASC";
        break;
      case "price_desc":
        $orderClause = "ORDER BY t.truck_price DESC";
        break;
      case "newest":
      default:
        $orderClause = "ORDER BY t.createddt DESC";
        break;
    }

    // Pagination
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $currentPage = max(1, $currentPage);
    $itemsPerPage = 9;
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Main query
    $sql = "SELECT t.*, b.brand_name, t.truck_name, t.truck_price, truck_link, tt.truck_type, ts.status AS availability_status,
        (SELECT pictures FROM tbl_truck_pictures WHERE truckid = t.id AND statid != '4' LIMIT 1) AS image_path
        FROM tbl_trucks t
        LEFT JOIN tbl_brand_logo b ON b.brand_name = t.truck_name
        LEFT JOIN tbl_truck_type tt ON t.typeid = tt.id
        LEFT JOIN tbl_truck_status ts ON t.statid = ts.id
        $condition
        $orderClause
        LIMIT $offset, $itemsPerPage";

    $result = $conn->query($sql);

    if (!$result) {
      die("Query failed: " . $conn->error);
    }

    // Get total count for pagination
    $countSql = "SELECT COUNT(*) AS total FROM tbl_trucks t
           LEFT JOIN tbl_brand_logo b ON b.brand_name = t.truck_name
           LEFT JOIN tbl_truck_type tt ON t.typeid = tt.id
           LEFT JOIN tbl_truck_status ts ON t.statid = ts.id
           $condition";
    $countResult = $conn->query($countSql);
    $totalItems = $countResult->fetch_assoc()['total'];
    $totalPages = ceil($totalItems / $itemsPerPage);

    if ($isAjax) {
      // For AJAX requests, only return the truck listings HTML
      ob_start();
?>
    <div class="truck-listings grid-view">
      <?php
      $sql = "SELECT t.id, t.truck_code, t.truck_name, t.truck_price, t.truck_link, t.truck_color, t.year_model, 
                      p.pictures AS image_path, b.brand_name, tt.truck_type, ts.status
              FROM tbl_trucks t 
              LEFT JOIN tbl_brand_logo b ON b.brand_name = t.truck_name
              LEFT JOIN tbl_truck_type tt ON t.typeid = tt.id
              LEFT JOIN tbl_truck_pictures p ON t.id = p.truckid
              LEFT JOIN tbl_truck_status ts ON t.statid = ts.id
              WHERE t.statid = 1
              ORDER BY t.createddt DESC";

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $path = $row['image_path'];
              $image = "../admin/{$path}";
              $truck_name = htmlspecialchars($row['truck_name'] ?? "");
              $truck_code = htmlspecialchars($row['truck_code'] ?? "");
              $truck_price = htmlspecialchars($row['truck_price'] ?? "");
              $year_model = htmlspecialchars($row['year_model'] ?? "");
              $truck_color = htmlspecialchars($row['truck_color'] ?? "");
              $truck_type = htmlspecialchars($row['truck_type'] ?? "");
              $brand_name = htmlspecialchars($row['brand_name'] ?? "");
              $truck_status = htmlspecialchars($row['status'] ?? "Available");
              $truck_link = htmlspecialchars($row['truck_link'] ?? "");
              $truck_id = htmlspecialchars($row['id'] ?? "");
      ?>
       <div class="truck-item card mb-4 h-100">
              <div class="truck-image-container">
              <img src="<?php echo $image; ?>" class="card-img-top truck-image" alt="<?php echo $truck_name; ?>" style="object-fit: cover; width: 100%; height: 100%;">
              <div class="badge-overlay">
                <span class="badge bg-success text-dark"><?php echo $truck_status; ?></span>
              </div>
              </div>
              <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                <h5 class="card-title mb-1"><?php echo $brand_name; ?></h5>
                <h6 class="card-subtitle text-muted small"><?php echo $truck_type; ?> / <?php echo $truck_name; ?></h6>
                </div>
                <div class="price-tag">
                <span class="price-tag fw-bold text-success">₱<?php echo $truck_price; ?></span>
                </div>
              </div>
              <div class="truck-specs mb-3">
                <div class="spec-item"><i class="bi bi-calendar text-muted"></i> <span class="small"><?php echo $year_model; ?></span></div>
                <div class="spec-item"><i class="bi bi-palette text-muted"></i> <span class="color-swatch-modern" style="background-color:<?php echo $truck_color; ?>;"></span></div>
              </div>
              <div class="d-flex gap-2">
              <a href="Trucks_description.php?id=<?php echo $truck_id; ?>" class="btn btn-outline-primary flex-grow-1 btn-sm">View Details <i class="bi bi-chevron-right"></i></a>
              <?php if (!empty($truck_link)): ?>
                <a href="<?php echo $truck_link; ?>" class="btn btn-success btn-sm" target="_blank">
                  <i class="bi bi-chat-dots"></i> Inquire
                </a>
              <?php else: ?>
                <a href="javascript:void(0);" onclick="openInquiry(<?php echo $truck_id; ?>, '<?php echo htmlspecialchars(addslashes($truck_code)); ?>')" class="btn btn-success btn-sm">
                  <i class="bi bi-chat-dots"></i> Inquire
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php
          }
      } else {
          echo "<div class='col-12'><p class='text-muted'>No trucks found matching your filters.</p></div>";
      }
      ?>
    </div>

    <div class="truck-listings list-view d-none">
  <?php
  $sql = "SELECT t.id, t.truck_code, t.truck_name, t.truck_price , t.truck_link, t.truck_color, t.year_model, 
                 p.pictures AS image_path, b.brand_name, tt.truck_type, ts.status
          FROM tbl_trucks t 
          LEFT JOIN tbl_brand_logo b ON b.brand_name = t.truck_name
          LEFT JOIN tbl_truck_type tt ON t.typeid = tt.id
          LEFT JOIN tbl_truck_pictures p ON t.id = p.truckid
          LEFT JOIN tbl_truck_status ts ON t.statid = ts.id
          WHERE t.statid = 1
          ORDER BY t.createddt DESC";

  if ($result->num_rows > 0) {
      $result->data_seek(0);
      while ($row = $result->fetch_assoc()) {
          $path = $row['image_path'];
          $image = "../admin/{$path}";
          $truck_name = htmlspecialchars($row['truck_name'] ?? "");
          $truck_code = htmlspecialchars($row['truck_code'] ?? "");
          $truck_price = htmlspecialchars($row['truck_price'] ?? "");
          $year_model = htmlspecialchars($row['year_model'] ?? "");
          $truck_color = htmlspecialchars($row['truck_color'] ?? "");
          $truck_type = htmlspecialchars($row['truck_type'] ?? "");
          $brand_name = htmlspecialchars($row['brand_name'] ?? "");
          $truck_status = htmlspecialchars($row['status'] ?? "Available");
          $truck_link = htmlspecialchars($row['truck_link'] ?? "");
          $truck_id = htmlspecialchars($row['id'] ?? "");
  ?>
  <div class="truck-list-item">
    <div class="truck-list-container">
      <div class="truck-list-image">
        <img src="<?php echo $image; ?>" alt="<?php echo $truck_name; ?>">
        <div class="badge-overlay">
          <span class="badge bg-success text-dark"><?php echo $truck_status; ?></span>
        </div>
      </div>
      
      <div class="truck-list-content">
        <div class="truck-list-header">
          <div class="truck-main-info">
            <h3 class="truck-brand"><?php echo $brand_name; ?></h3>
            <p class="truck-type"><?php echo $truck_type; ?> / <?php echo $truck_name; ?></p>
          </div>
          <div class="truck-price">
            <span class="price-amount text-success">₱<?php echo number_format($truck_price, 2); ?></span>
            <span class="truck-code"><?php echo $truck_code; ?></span>
          </div>
        </div>
        
        <div class="truck-list-details">
          <div class="detail-item">
            <i class="bi bi-calendar"></i>
            <span><?php echo $year_model; ?></span>
          </div>
          <div class="detail-item">
            <span class="color-swatch">
            <i class="bi bi-palette" ></i>
            <span class="color-swatch-modern" style="background-color:<?php echo $truck_color; ?>;"></span>
            <?php echo $truck_color; ?>
            </span>
          </div>
        </div>
        <div class="truck-list-actions">
        <a href="Trucks_description.php?id=<?php echo $truck_id; ?>" class="btn-view-details">
          View Details <i class="bi bi-arrow-right"></i>
        </a>
        <?php if (!empty($truck_link)): ?>
          <a href="<?php echo $truck_link; ?>" class="btn-inquire" target="_blank">
            <i class="bi bi-chat-dots"></i> Inquire Now
          </a>
        <?php else: ?>
          <a href="javascript:void(0);" onclick="openInquiryTab(<?php echo $truck_id; ?>)" class="btn-inquire">
            <i class="bi bi-chat-dots"></i> Inquire Now
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php
    }
}
?>
</div>
      <nav aria-label="Truck listings pagination" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php
                // Calculate total pages
                $itemsPerPage = 9;
                $totalItems = isset($totalItems) ? $totalItems : 0;
                $totalPages = max(1, ceil($totalItems / $itemsPerPage));

                // Get the current page from the URL, default to page 1
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $currentPage = max(1, min($currentPage, $totalPages));

                // Preserve other query parameters
                $queryParams = $_GET;
                // Previous Page Button
                $queryParams['page'] = max(1, $currentPage - 1);
                $prevUrl = '?' . http_build_query($queryParams);
                ?>
                <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo ($currentPage == 1) ? '#' : $prevUrl; ?>" tabindex="-1">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
                <?php
                // Page Numbers - Show limited page numbers with ellipsis
                $maxPagesToShow = 5; // Maximum number of page links to display
                
                if ($totalPages <= $maxPagesToShow) {
                    // If total pages are less than max to show, display all pages
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $queryParams['page'] = $i;
                        $pageUrl = '?' . http_build_query($queryParams);
                        echo "<li class='page-item " . ($i == $currentPage ? 'active' : '') . "'>
                                <a class='page-link' href='$pageUrl'>$i</a>
                              </li>";
                    }
                } else {
                    // Always show first page
                    $queryParams['page'] = 1;
                    $pageUrl = '?' . http_build_query($queryParams);
                    echo "<li class='page-item " . (1 == $currentPage ? 'active' : '') . "'>
                            <a class='page-link' href='$pageUrl'>1</a>
                          </li>";
                    
                    // Calculate start and end pages to show
                    $startPage = max(2, $currentPage - floor($maxPagesToShow / 2));
                    $endPage = min($totalPages - 1, $currentPage + floor($maxPagesToShow / 2));
                    
                    // Adjust if we're near the beginning
                    if ($startPage == 2) {
                        $endPage = min($totalPages - 1, $maxPagesToShow - 1);
                    }
                    
                    // Adjust if we're near the end
                    if ($endPage == $totalPages - 1) {
                        $startPage = max(2, $totalPages - $maxPagesToShow + 2);
                    }
                    
                    // Show ellipsis after first page if needed
                    if ($startPage > 2) {
                        echo "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>";
                    }
                    
                    // Show middle pages
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        $queryParams['page'] = $i;
                        $pageUrl = '?' . http_build_query($queryParams);
                        echo "<li class='page-item " . ($i == $currentPage ? 'active' : '') . "'>
                                <a class='page-link' href='$pageUrl'>$i</a>
                              </li>";
                    }
                    
                    // Show ellipsis before last page if needed
                    if ($endPage < $totalPages - 1) {
                        echo "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>";
                    }
                    
                    // Always show last page
                    $queryParams['page'] = $totalPages;
                    $pageUrl = '?' . http_build_query($queryParams);
                    echo "<li class='page-item " . ($totalPages == $currentPage ? 'active' : '') . "'>
                            <a class='page-link' href='$pageUrl'>$totalPages</a>
                          </li>";
                }
                
                // Next Page Button
                $queryParams['page'] = min($totalPages, $currentPage + 1);
                $nextUrl = '?' . http_build_query($queryParams);
                ?>
                <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo ($currentPage == $totalPages) ? '#' : $nextUrl; ?>">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
            <div class="text-center text-muted small mt-2">
                Showing <?php echo ($totalItems == 0) ? 0 : (($currentPage - 1) * $itemsPerPage) + 1; ?>
                to <?php echo min($currentPage * $itemsPerPage, $totalItems); ?> of <?php echo $totalItems; ?> entries
            </div>
        </nav>
      <?php
      $content = ob_get_clean();
      echo $content;
      exit();
  }
?>

<section id="projects" class="projects section">
  <!-- Section Title -->
  <div class="section-title" data-aos="fade-up">
    <h2>Truck Models</h2>
    <p>Trucks are versatile vehicles designed for carrying heavy loads, towing, and tackling tough terrain.</p>
  </div>

  <div class="container">
    <div class="loading-spinner d-none text-center py-4">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="row">
      <!-- Left Sidebar Filters -->
      <div class="col-lg-3 col-md-4">
        <!-- Filter Form -->
        <form method="GET" action="" class="sidebar-filter card shadow-sm mb-4" id="filter-form">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="filter-title mb-0">Filter Trucks</h5>
            </div>

            <!-- Search Bar -->
            <div class="filter-section mb-4">
              <h6 class="filter-subtitle">Search</h6>
              <div class="input-group">
                <input type="text" class="form-control form-control-sm" placeholder="Search trucks..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" name="search">
              </div>
            </div>

            <!-- Brand Filter -->
            <div class="filter-section mb-4">
              <h6 class="filter-subtitle mb-0">Brand</h6><br>
              <div class="category-list">
                <?php
                $brands = $conn->query("SELECT * FROM tbl_brand_logo");
                while ($b = $brands->fetch_assoc()) {
                  $checked = in_array($b['brand_name'], $brandFilter) ? 'checked' : '';
                  echo "<div class='form-check'>
                          <input class='form-check-input brand-checkbox' type='checkbox' name='brand[]' value='{$b['brand_name']}' id='brand_{$b['id']}' $checked>
                          <label class='form-check-label' for='brand_{$b['id']}'>{$b['brand_name']}</label>
                        </div>";
                }
                ?>
              </div>
            </div>

            <style>
              .form-check-input.brand-checkbox:checked {
                background-color: #10a729;
                border-color: #10a729;
              }
            </style>

            <!-- Category Filter -->
            <div class="filter-section mb-4">
              <h6 class="filter-subtitle mb-0">Categories</h6><br>
              <div class="category-list">
                <?php
                $types = $conn->query("SELECT * FROM tbl_truck_type");
                while ($t = $types->fetch_assoc()) {
                  $checked = in_array($t['truck_type'], $categoryFilter) ? 'checked' : '';
                  echo "<div class='form-check'>
                          <input class='form-check-input category-checkbox' type='checkbox' name='category[]' value='{$t['truck_type']}' id='cat_{$t['id']}' $checked>
                          <label class='form-check-label' for='cat_{$t['id']}'>{$t['truck_type']}</label>
                        </div>";
                }
                ?>
              </div>
            </div>

            <style>
              .form-check-input.category-checkbox:checked {
                background-color: #10a729;
                border-color: #10a729;
              }
            </style>
          </div>
        </form>
      </div>
      <!-- End Left Sidebar Filters -->
      <!-- Right Content: Truck Results -->
      <div class="col-lg-9 col-md-8">
        <div class="sorting-options mb-4">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="sort-by d-flex align-items-center">
              <label class="me-2 small">Sort by:</label>
              <select class="form-select form-select-sm" name="sort" form="filter-form" >
                <?php
                // Get current sort parameter
                $sortBy = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
                
                // Query to get price ranges
                $price_sql = "SELECT MIN(truck_price) as min_price, MAX(truck_price) as max_price FROM tbl_trucks WHERE statid = 1";
                $price_result = $conn->query($price_sql);
                $price_data = $price_result->fetch_assoc();
                
                $min_price = $price_data['min_price'];
                $max_price = $price_data['max_price'];

                // Define sort options with their display text and values
                $sortOptions = [
                  'newest' => 'Newest First',
                  'price_asc' => 'Price: Low to High ',
                  'price_desc' => 'Price: High to Low '
                ];

                // Generate options
                foreach ($sortOptions as $value => $text) {
                  $selected = ($sortBy === $value) ? 'selected' : '';
                  echo "<option value=\"$value\" $selected>$text</option>";
                }
                ?>
              </select>
              </div>
            </div>
            <div class="col-md-6 text-md-end">
              <div class="view-options btn-group" role="group">
                <button type="button" class="btn btn-sm btn-outline-success view-grid active" onclick="toggleView('grid')">
                  <i class="bi bi-grid-fill"></i> Grid
                </button>
                <button type="button" class="btn btn-sm btn-outline-success view-list" onclick="toggleView('list')">
                  <i class="bi bi-list-ul"></i> List
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Grid View -->
        <div class="truck-listings grid-view">
          <?php
          $sql = "SELECT t.id, t.truck_code, t.truck_name, t.truck_price, t.truck_link, t.truck_color, t.year_model, 
                         p.pictures AS image_path, b.brand_name, tt.truck_type, ts.status
                  FROM tbl_trucks t 
                  LEFT JOIN tbl_brand_logo b ON b.brand_name = t.truck_name
                  LEFT JOIN tbl_truck_type tt ON t.typeid = tt.id
                  LEFT JOIN tbl_truck_pictures p ON t.id = p.truckid
                  LEFT JOIN tbl_truck_status ts ON t.statid = ts.id
                  WHERE t.statid = 1
                  ORDER BY t.createddt DESC";

          if ($result->num_rows > 0) {
              $result->data_seek(0);
              while ($row = $result->fetch_assoc()) {
                  $path = $row['image_path'];
                  $image = "../admin/{$path}";
                  $truck_name = htmlspecialchars($row['truck_name'] ?? "");
                  $truck_code = htmlspecialchars($row['truck_code'] ?? "");
                  $truck_price = htmlspecialchars($row['truck_price'] ?? "");
                  $year_model = htmlspecialchars($row['year_model'] ?? "");
                  $truck_color = htmlspecialchars($row['truck_color'] ?? "");
                  $truck_type = htmlspecialchars($row['truck_type'] ?? "");
                  $brand_name = htmlspecialchars($row['brand_name'] ?? "");
                  $truck_status = htmlspecialchars($row['status'] ?? "Available");
                  $truck_link = htmlspecialchars($row['truck_link'] ?? "");
                  $truck_id = htmlspecialchars($row['id'] ?? "");
            ?>
            <div class="truck-item card mb-4 h-100">
              <div class="truck-image-container">
              <img src="<?php echo $image; ?>" class="card-img-top truck-image" alt="<?php echo $truck_name; ?>" style="object-fit: cover; width: 100%; height: 100%;">
              <div class="badge-overlay">
                <span class="badge bg-success text-dark"><?php echo $truck_status; ?></span>
              </div>
              </div>
              <div class="card-body">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                <h5 class="card-title mb-1"><?php echo $brand_name; ?></h5>
                <h6 class="card-subtitle text-muted small"><?php echo $truck_type; ?> / <?php echo $truck_name; ?></h6>
                </div>
                <div class="price-tag">
                <span class="price-tag fw-bold text-success">₱<?php echo $truck_price; ?></span>
                </div>
              </div>
              <div class="truck-specs mb-3">
                <div class="spec-item"><i class="bi bi-calendar text-muted"></i> <span class="small"><?php echo $year_model; ?></span></div>
                <div class="spec-item"><i class="bi bi-palette text-muted"></i> <span class="color-swatch-modern" style="background-color:<?php echo $truck_color; ?>;"></span></div>
              </div>
              <div class="features mb-3">
                <span class="badge bg-light text-dark me-1 small"><?php echo $truck_code; ?></span>
              </div>
              <div class="d-flex gap-2">
          <a href="Trucks_description.php?id=<?php echo $truck_id; ?>" class="btn btn-outline-primary flex-grow-1 btn-sm">View Details <i class="bi bi-chevron-right"></i></a>
          <?php if (!empty($truck_link)): ?>
            <a href="<?php echo $truck_link; ?>" class="btn btn-success btn-sm" target="_blank">
              <i class="bi bi-chat-dots"></i> Inquire
            </a>
          <?php else: ?>
            <a href="javascript:void(0);" onclick="openInquiry(<?php echo $truck_id; ?>, '<?php echo htmlspecialchars(addslashes($truck_code)); ?>')" class="btn btn-success btn-sm">
              <i class="bi bi-chat-dots"></i> Inquire
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php
      }
  } else {
      echo "<div class='col-12'><p class='text-muted'>No trucks found matching your filters.</p></div>";
  }
  ?>
</div>

        <!-- List View -->
        <div class="truck-listings list-view d-none">
  <?php
  $sql = "SELECT t.id, t.truck_code, t.truck_name, t.truck_price, t.truck_link, t.truck_color, t.year_model, 
                 p.pictures AS image_path, b.brand_name, tt.truck_type, ts.status
          FROM tbl_trucks t 
          LEFT JOIN tbl_brand_logo b ON b.brand_name = t.truck_name
          LEFT JOIN tbl_truck_type tt ON t.typeid = tt.id
          LEFT JOIN tbl_truck_pictures p ON t.id = p.truckid
          LEFT JOIN tbl_truck_status ts ON t.statid = ts.id
          WHERE t.statid = 1
          ORDER BY t.createddt DESC";

  if ($result->num_rows > 0) {
      $result->data_seek(0);
      while ($row = $result->fetch_assoc()) {
          $path = $row['image_path'];
          $image = "../admin/{$path}";
          $truck_name = htmlspecialchars($row['truck_name'] ?? "");
          $truck_code = htmlspecialchars($row['truck_code'] ?? "");
          $truck_price = htmlspecialchars($row['truck_price'] ?? "");
          $year_model = htmlspecialchars($row['year_model'] ?? "");
          $truck_color = htmlspecialchars($row['truck_color'] ?? "");
          $truck_type = htmlspecialchars($row['truck_type'] ?? "");
          $brand_name = htmlspecialchars($row['brand_name'] ?? "");
          $truck_status = htmlspecialchars($row['status'] ?? "Available");
          $truck_link = htmlspecialchars($row['truck_link'] ?? "");
          $truck_id = htmlspecialchars($row['id'] ?? "");
  ?>
  <div class="truck-list-item">
    <div class="truck-list-container">
      <div class="truck-list-image">
        <img src="<?php echo $image; ?>" alt="<?php echo $truck_name; ?>">
        <div class="badge-overlay">
          <span class="badge bg-success text-dark"><?php echo $truck_status; ?></span>
        </div>
      </div>
      
      <div class="truck-list-content">
        <div class="truck-list-header">
          <div class="truck-main-info">
            <h3 class="truck-brand"><?php echo $brand_name; ?></h3>
            <p class="truck-type"><?php echo $truck_type; ?> / <?php echo $truck_name; ?></p>
          </div>
          <div class="truck-price">
            <span class="price-amount text-success">₱<?php echo number_format($truck_price, 2); ?></span>
            <span class="truck-code"><?php echo $truck_code; ?></span>
          </div>
        </div>
        
        <div class="truck-list-details">
          <div class="detail-item">
            <i class="bi bi-calendar"></i>
            <span><?php echo $year_model; ?></span>
          </div>
          <div class="detail-item">
            <span class="color-swatch">
            <i class="bi bi-palette" ></i>
            <span class="color-swatch-modern" style="background-color:<?php echo $truck_color; ?>;"></span>
            <?php echo $truck_color; ?>
            </span>
          </div>
        </div>
        <div class="truck-list-actions">
        <a href="Trucks_description.php?id=<?php echo $truck_id; ?>" class="btn-view-details">
          View Details <i class="bi bi-arrow-right"></i>
        </a>
        <?php if (!empty($truck_link)): ?>
          <a href="<?php echo $truck_link; ?>" class="btn-inquire" target="_blank">
            <i class="bi bi-chat-dots"></i> Inquire Now
          </a>
        <?php else: ?>
          <a href="javascript:void(0);" onclick="openInquiryTab(<?php echo $truck_id; ?>)" class="btn-inquire">
            <i class="bi bi-chat-dots"></i> Inquire Now
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php
    }
}
?>
</div>
        <!-- End List View -->
      </div>
        <!-- Pagination -->
           <nav aria-label="Truck listings pagination" class="mt-4">
            <ul class="pagination justify-content-center">
                <?php
                // Calculate total pages
                $itemsPerPage = 9;
                $totalItems = isset($totalItems) ? $totalItems : 0;
                $totalPages = max(1, ceil($totalItems / $itemsPerPage));

                // Get the current page from the URL, default to page 1
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $currentPage = max(1, min($currentPage, $totalPages));

                // Preserve other query parameters
                $queryParams = $_GET;
                // Previous Page Button
                $queryParams['page'] = max(1, $currentPage - 1);
                $prevUrl = '?' . http_build_query($queryParams);
                ?>
                <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo ($currentPage == 1) ? '#' : $prevUrl; ?>" tabindex="-1">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
                <?php
                // Page Numbers - Show limited page numbers with ellipsis
                $maxPagesToShow = 5; // Maximum number of page links to display
                
                if ($totalPages <= $maxPagesToShow) {
                    // If total pages are less than max to show, display all pages
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $queryParams['page'] = $i;
                        $pageUrl = '?' . http_build_query($queryParams);
                        echo "<li class='page-item " . ($i == $currentPage ? 'active' : '') . "'>
                                <a class='page-link' href='$pageUrl'>$i</a>
                              </li>";
                    }
                } else {
                    // Always show first page
                    $queryParams['page'] = 1;
                    $pageUrl = '?' . http_build_query($queryParams);
                    echo "<li class='page-item " . (1 == $currentPage ? 'active' : '') . "'>
                            <a class='page-link' href='$pageUrl'>1</a>
                          </li>";
                    
                    // Calculate start and end pages to show
                    $startPage = max(2, $currentPage - floor($maxPagesToShow / 2));
                    $endPage = min($totalPages - 1, $currentPage + floor($maxPagesToShow / 2));
                    
                    // Adjust if we're near the beginning
                    if ($startPage == 2) {
                        $endPage = min($totalPages - 1, $maxPagesToShow - 1);
                    }
                    
                    // Adjust if we're near the end
                    if ($endPage == $totalPages - 1) {
                        $startPage = max(2, $totalPages - $maxPagesToShow + 2);
                    }
                    
                    // Show ellipsis after first page if needed
                    if ($startPage > 2) {
                        echo "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>";
                    }
                    
                    // Show middle pages
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        $queryParams['page'] = $i;
                        $pageUrl = '?' . http_build_query($queryParams);
                        echo "<li class='page-item " . ($i == $currentPage ? 'active' : '') . "'>
                                <a class='page-link' href='$pageUrl'>$i</a>
                              </li>";
                    }
                    
                    // Show ellipsis before last page if needed
                    if ($endPage < $totalPages - 1) {
                        echo "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>";
                    }
                    
                    // Always show last page
                    $queryParams['page'] = $totalPages;
                    $pageUrl = '?' . http_build_query($queryParams);
                    echo "<li class='page-item " . ($totalPages == $currentPage ? 'active' : '') . "'>
                            <a class='page-link' href='$pageUrl'>$totalPages</a>
                          </li>";
                }
                
                // Next Page Button
                $queryParams['page'] = min($totalPages, $currentPage + 1);
                $nextUrl = '?' . http_build_query($queryParams);
                ?>
                <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo ($currentPage == $totalPages) ? '#' : $nextUrl; ?>">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
            <div class="text-center text-muted small mt-2">
                Showing <?php echo ($totalItems == 0) ? 0 : (($currentPage - 1) * $itemsPerPage) + 1; ?>
                to <?php echo min($currentPage * $itemsPerPage, $totalItems); ?> of <?php echo $totalItems; ?> entries
            </div>
        </nav>
      </div>
    </div>
  </div>
</section>
    
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact Us</h2>
        <p>We're Here to Help, Simply Reach Out.</p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>KM 27 AGUINALDO HIGHWAY SALITRAN 1, DASMARIÑAS CITY, CAVITE</p>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>0917-713-7016 / 0930-576-6879</p>
            </div>
          </div>
          <!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>kansaiueno@gmail.com</p>
            </div>
          </div>
          <!-- End Info Item -->
        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.2527101107376!2d120.93521647427823!3d14.35478178304943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d56b5a55814f%3A0xf01215d64594c710!2sGRJ%20Jaro%20Building!5e0!3m2!1sen!2sph!4v1682409270375!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <!-- End Google Maps -->

          <div class="col-lg-6">
            <form id="emailsend" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Contact Number" required>
                </div>
                <div class="col-md-12">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" id="message" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
          <!-- End Contact Form -->
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

    <section id="stats-counter" class="stats-counter section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Companies</h2>
        <p>The Authority in All Things Trucks.</p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="company-carousel-container">
          <!-- Owl Carousel Container -->
          <div class="owl-carousel company-carousel">

            <!-- Company Item 1 -->
            <div class="company-item">
              <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/kansaibg.png" alt="Kansai Ueno Logo" style="width: 180px; height: 120px; object-fit: contain;">
              </a>
            </div>

            <!-- Company Item 2 -->
            <div class="company-item">
              <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/grjinterpriselogo.png" alt="GRJ Jaro Interprise Logo" style="width: 180px; height: 120px; object-fit: contain;">
              </a>
            </div>

            <!-- Company Item 3 -->
            <div class="company-item">
              <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/pawnshoplogo.png" alt="GRJ Jaro Pawnshop Logo" style="width: 180px; height: 120px; object-fit: contain;">
              </a>
            </div>

            <!-- Company Item 4 -->
            <div class="company-item">
              <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/readymixlogo.png" alt="GRJ Jaro ReadyMix Logo" style="width: 180px; height: 120px; object-fit: contain;">
              </a>
            </div>

            <!-- Company Item 5 -->
            <div class="company-item">
              <a href="#" class="logo d-flex align-items-center">
                <img src="assets/img/south4logo.jpg" alt="South 4 Builders Logo" style="width: 180px; height: 120px; object-fit: contain;">
              </a>
            </div>

            <!-- Company Item 6 -->
            <div class="company-item">
              <a href="https://admin.kansaiueno.grj.com.ph/admin/user.php" class="logo d-flex align-items-center">
                <img src="assets/img/jaromedlogo.png" alt="Jaro Med & Diagnostic Center Logo" style="width: 180px; height: 120px; object-fit: contain;">
              </a>
            </div>

          </div>
          <!-- End Owl Carousel -->
        </div>
      </div>
    </section>
  <!-- End Main Content -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php include 'section/script.php'; ?>
<?php include 'section/footer.php'; ?>

</body>
</html>
