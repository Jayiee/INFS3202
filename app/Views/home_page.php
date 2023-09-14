
    <!-- Custom styles for this template -->
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>


<main>

<!-- 搜索框 -->
<div class="container-fluid" style="margin-top:50px; margin-bottom:20px;">
    <form class="d-flex" role="search" action="<?= base_url() ?>search" method="post">
      <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
      <input class="form-control me-2" type="text" name="keyword" id="search-input" placeholder="Search..." autocomplete="off" />
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div style="display: none;"id="search-suggestions" class="search-suggestions"></div>
</div>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
      <defs>
        <pattern id="image-pattern1" x="0" y="0" width="100%" height="100%">
          <image x="0" y="0" width="100%" height="100%" xlink:href="<?php echo base_url(); ?>public/assets/image/Carousel3.png" />
        </pattern>
      </defs>  
      <rect width="100%" height="100%" fill="url(#image-pattern1)"/></svg>
      <div class="container">
        <div class="carousel-caption text-start">
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
      <defs>
        <pattern id="image-pattern2" x="0" y="0" width="100%" height="100%">
          <image x="0" y="0" width="100%" height="100%" xlink:href="<?php echo base_url(); ?>public/assets/image/Carousel2.jpeg" />
        </pattern>
      </defs>  
      <rect width="100%" height="100%" fill="url(#image-pattern2)"/></svg>
      <div class="container">
        <div class="carousel-caption">
          <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
      <defs>
        <pattern id="image-pattern3" x="0" y="0" width="100%" height="100%">
          <image x="0" y="0" width="100%" height="100%" xlink:href="<?php echo base_url(); ?>public/assets/image/Carousel1.png" />
        </pattern>
      </defs>  
      <rect width="100%" height="100%" fill="url(#image-pattern3)"/></svg>
      <div class="container">
        <div class="carousel-caption text-end">
        </div>
      </div>
    </div>
  </div>
  <button  style="color:black;background-color:black;" class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button  style="color:black;background-color:black;"class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
  <!-- Three columns of text below the carousel -->
  <div class="album py-5 bg-body-tertiary" >
    <div class="container">
      <h1>Get Started with These Free Courses</h1>
      <hr>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <image href="<?php echo base_url(); ?>writable/uploads_cover/Python_1.png" width="100%" height="100%" />
            </svg>
            <div class="card-body">
              <p class="card-text">This is the Python 1 course.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button onclick="window.location.href='<?php echo base_url(); ?> course_video'" type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add</button>
                </div>
                <small class="text-body-secondary">admin3</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <image href="<?php echo base_url(); ?>writable/uploads_cover/Python_2.png" width="100%" height="100%" />
            </svg>
            <div class="card-body">
              <p class="card-text">This is the Python 2 course.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button onclick="window.location.href='<?php echo base_url(); ?> course_video_2'" type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add</button>
                </div>
                <small class="text-body-secondary">admin3</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            <image href="<?php echo base_url(); ?>writable/uploads_cover/Python_3.png" width="100%" height="100%" />
            </svg>
            <div class="card-body">
              <p class="card-text">This is the Python 3 course.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button onclick="window.location.href='<?php echo base_url(); ?> course_video_3'" type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add</button>
                </div>
                <small class="text-body-secondary">admin3</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-body-secondary">It’ll blow your mind.</span></h2>
      <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-body-secondary">See for yourself.</span></h2>
      <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
    </div>
    <div class="col-md-5 order-md-1">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-body-secondary">Checkmate.</span></h2>
      <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
    </div>
    <div class="col-md-5">
      <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-bg)"/><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text></svg>
    </div>
  </div>

  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

</div>


<style>

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
</style>


<!-- 搜索框自动联想 -->
<script>
  // 当搜索输入框中的文本发生改变时，通过 AJAX 向服务器发送请求，请求搜索建议列表
  $(document).ready(function() {
    $('#search-input').keyup(function() {
        var query = $(this).val();
        if (query != '') {
            $.ajax({
                url: "<?php echo base_url('search/suggest'); ?>",
                method: 'POST',
                data: { keyword: query },
                success: function(data) {
                    $('#search-suggestions').html(data);
                    $('#search-suggestions').show();
                    console.log('Search query:', query);
                }
            });
        } else {
            $('#search-suggestions').hide();
        }
    });

    // 当用户点击搜索建议列表中的某个建议时，将该建议的文本设置为搜索输入框中的值
    $(document).on('click', '.suggestion', function() {
        var value = $(this).text();
        $('#search-input').val(value);
        $('#search-suggestions').hide();
    });

    // 当用户点击页面上除搜索建议列表和搜索输入框外的其他部分时，隐藏搜索建议列表
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#search-suggestions').length && !$(event.target).is('#search-input')) {
            $('#search-suggestions').hide();
        }
    });
  });
</script>


<!-- 记录html页面位置 -->
<script>
    // 保存当前页面滚动位置
    function saveScrollPosition() {
        var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
        sessionStorage.setItem('scrollPosition', scrollPosition);
    }

    // 恢复页面滚动位置
    function restoreScrollPosition() {
        var scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
            sessionStorage.removeItem('scrollPosition');
        }
    }

    // 在页面加载时保存滚动位置
    window.addEventListener('beforeunload', saveScrollPosition);

    // 在页面加载完成时恢复滚动位置
    window.addEventListener('load', restoreScrollPosition);

    // 在使用浏览器的返回按钮时恢复滚动位置
    window.addEventListener('popstate', restoreScrollPosition);
</script>


