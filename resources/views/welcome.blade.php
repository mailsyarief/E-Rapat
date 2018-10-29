{{-- <!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-Rapat</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/neat.min.css') }}">
        <script type="text/javascript" src="{{ asset('js/neat.min.js') }}"></script>

    </head>
    <body class="o-page">
        
        <!-- Notice `.js-page-sidebar` used for toggling sidebar via javascript -->
        <aside class="o-page__sidebar js-page-sidebar"></aside>

        <main class="o-page__content">
            
        </main>
    </body>
</html>
 --}}

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard Three | Neat</title>
    <meta name="description" content="Neat">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Favicon -->
{{--     <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 --}}
    <!-- Stylesheet -->
    {{-- <link rel="stylesheet" href="css/neat.min.css?v=1.0"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/neat.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/neat.min.js') }}"></script>

  </head>
  <body>

    <div class="o-page">
      <div class="o-page__sidebar js-page-sidebar">
        <aside class="c-sidebar">
          <div class="c-sidebar__brand">
            <h2>E-Rapat</h2>
          </div>

          <!-- Scrollable -->
          <div class="c-sidebar__body">
            <span class="c-sidebar__title">General</span>
            <ul class="c-sidebar__list">
              <li>
                <a class="c-sidebar__link" href="pipeline.html">
                  <i class="c-sidebar__icon feather icon-move"></i>Pipeline
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="calendar.html">
                  <i class="c-sidebar__icon feather icon-calendar"></i>Calendar
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="members.html">
                  <i class="c-sidebar__icon feather icon-users"></i>Members
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="invoice.html">
                  <i class="c-sidebar__icon feather icon-file-text"></i>Single Invoice
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="user-profile.html">
                  <i class="c-sidebar__icon feather icon-user"></i>User
                </a>

                <!-- Always visible submenu -->
                <ul class="c-sidebar__list">
                  <li><a class="c-sidebar__link" href="index.html">Onboard</a></li>
                  <li><a class="c-sidebar__link" href="account-settings.html">Account Settings</a></li>
                  <li><a class="c-sidebar__link" href="signup.html">Sign Up</a></li>
                  <li><a class="c-sidebar__link" href="signin.html">Sign In</a></li>
                  <li><a class="c-sidebar__link" href="reset-password.html">Reset Password</a></li>
                  <li><a class="c-sidebar__link" href="forgot-password.html">Forgot Password</a></li>
                </ul>
              </li>
              <li>
                <a class="c-sidebar__link" href="pricing.html">
                  <i class="c-sidebar__icon feather icon-tag"></i>Pricing
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="faq.html">
                  <i class="c-sidebar__icon feather icon-info"></i>FAQ
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="404.html">
                  <i class="c-sidebar__icon feather icon-anchor"></i>404
                </a>
              </li>

              <li class="c-sidebar__item has-submenu">
                <a class="c-sidebar__link" data-toggle="collapse" href="#sidebar-submenu" aria-expanded="false" aria-controls="sidebar-submenu">
                    <i class="c-sidebar__icon feather icon-hash"></i>Sub Menu
                </a>

                <div>
                  <ul class="c-sidebar__list collapse" id="sidebar-submenu">
                    <li><a class="c-sidebar__link" href="#">Submenu link</a></li>
                    <li><a class="c-sidebar__link" href="#">Submenu link</a></li>
                    <li><a class="c-sidebar__link" href="#">Submenu link</a></li>
                  </ul>
                </div>
                 
              </li>
            </ul>

            <span class="c-sidebar__title">Neat</span>
            <ul class="c-sidebar__list">
              <li>
                <a class="c-sidebar__link" href="ui-kit.html">
                  <i class="c-sidebar__icon feather icon-layers"></i>UI Kit
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="https://zawiastudio.com/neat/docs/">
                  <i class="c-sidebar__icon feather icon-book"></i>Documentation
                </a>
              </li>
              <li>
                <a class="c-sidebar__link" href="https://zawiastudio.com/neat/changelog/">
                  <i class="c-sidebar__icon feather icon-anchor"></i>Changelog
                </a>
              </li>
            </ul>
          </div>
          

          <a class="c-sidebar__footer" href="#">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
          </a>
        </aside>
      </div>

      <main class="o-page__content">
        <header class="c-navbar u-mb-medium">
          <button class="c-sidebar-toggle js-sidebar-toggle">
            <i class="feather icon-align-left"></i>
          </button>

          <h2 class="c-navbar__title">My Dashboard</h2>

          <div class="c-dropdown dropdown u-mr-small">
            <div class="c-notification dropdown-toggle" id="dropdownMenuToggle1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
              <i class="c-notification__icon feather icon-message-circle"></i>
            </div>

            <div class="c-dropdown__menu c-dropdown__menu--large has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuToggle1">

              <span class="c-dropdown__menu-header">
                Mentions
              </span>
              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
                    </span>
                  </div>

                  <div class="o-media__body">
                    <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
                    </span>
                  </div>

                  <div class="o-media__body">
                    <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-avatar c-avatar--xsmall">
                      <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
                    </span>
                  </div>

                  <div class="o-media__body">
                    <p>Hey, Julia how are you doing. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat eius iste.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__menu-footer">
                All Mentions
              </a>
            </div>
          </div>

          <div class="c-dropdown dropdown u-mr-medium">
            <div class="c-notification has-indicator dropdown-toggle" id="dropdownMenuToggle2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
              <i class="c-notification__icon feather icon-bell"></i>
            </div>

            <div class="c-dropdown__menu c-dropdown__menu--large has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuToggle2">

              <span class="c-dropdown__menu-header">
                Notifications
              </span>
              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-icon c-icon--info c-icon--xsmall"><i class="feather icon-globe"></i></span>
                  </div>

                  <div class="o-media__body">
                    <p>We've updated the Stripe Services agreement and its supporting terms. Your continueduse of Stripe's services.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-icon c-icon--danger c-icon--xsmall"><i class="feather icon-x"></i></span>
                  </div>

                  <div class="o-media__body">
                    <p>We've updated the Stripe Services agreement and its supporting terms. Your continueduse of Stripe's services.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__item dropdown-item" href="#">
                <div class="o-media">
                  <div class="o-media__img u-mr-xsmall">
                    <span class="c-icon c-icon--success c-icon--xsmall"><i class="feather icon-anchor"></i></span>
                  </div>

                  <div class="o-media__body">
                    <p>We've updated the Stripe Services agreement and its supporting terms. Your continueduse of Stripe's services.</p>
                  </div>
                </div>
              </a>

              <a class="c-dropdown__menu-footer">
                All Notifications
              </a>
            </div>
          </div>

          <div class="c-dropdown dropdown">
            <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
              <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Adam Sandler">
            </div>

            <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAvatar">
              <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
              <a class="c-dropdown__item dropdown-item" href="#">View Activity</a>
              <a class="c-dropdown__item dropdown-item" href="#">Log out</a>
            </div>
          </div>
        </header>

        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="c-state-card c-state-card--info">
                <h4 class="c-state-card__title">Clients</h4>
                <span class="c-state-card__number">45</span>
                <p class="c-state-card__status">
                  <i class="feather icon-trending-up"></i> 23% Increase
                </p>

                <div class="c-state-card__actions dropdown"> 
                  <span class="dropdown-toggle" id="dropdownMenuState1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <i class="feather icon-more-vertical"></i>
                  </span>

                  <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuState1">
                    <a class="c-dropdown__item dropdown-item" href="#">Link 1</a>
                    <a class="c-dropdown__item dropdown-item" href="#">Link 2</a>
                    <a class="c-dropdown__item dropdown-item" href="#">Link 3</a>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="col-md-4">
              <div class="c-state-card c-state-card--success">
                <h4 class="c-state-card__title">Projects</h4>
                <span class="c-state-card__number">540</span>
                <p class="c-state-card__status">
                  <i class="feather icon-trending-down"></i> 12% Decrease
                </p>
                <div class="c-state-card__actions dropdown"> 
                  <span class="dropdown-toggle" id="dropdownMenuState2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <i class="feather icon-more-vertical"></i>
                  </span>

                  <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuState2">
                    <a class="c-dropdown__item dropdown-item" href="#">Link 1</a>
                    <a class="c-dropdown__item dropdown-item" href="#">Link 2</a>
                    <a class="c-dropdown__item dropdown-item" href="#">Link 3</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="c-state-card c-state-card--fancy">
                <h4 class="c-state-card__title">Revenue</h4>
                <span class="c-state-card__number">$45,000</span>
                <p class="c-state-card__status">
                  <i class="feather icon-trending-up"></i> 65% Increase
                </p>
                <div class="c-state-card__actions dropdown"> 
                  <span class="dropdown-toggle" id="dropdownMenuState3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                    <i class="feather icon-more-vertical"></i>
                  </span>

                  <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuState3">
                    <a class="c-dropdown__item dropdown-item" href="#">Link 1</a>
                    <a class="c-dropdown__item dropdown-item" href="#">Link 2</a>
                    <a class="c-dropdown__item dropdown-item" href="#">Link 3</a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="c-card u-ph-zero u-pb-zero">

                <div class="u-ph-medium">
                  <h4>Sales</h4>
                  <p>Activity from 1 Jan 2018 to 30 July 2018</p>

                  <span class="u-h1">$45,000</span>
                </div>

                <div class="u-p-medium">
                  <div class="c-chart">
                    <div class="sales-chart"></div>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="col-md-6">
              <div class="c-card u-ph-zero u-pb-zero">

                <div class="u-ph-medium">
                  <h4>Payouts</h4>
                  <p>Activity from 1 Jan 2018 to 30 July 2018</p>

                  <span class="u-h1">$23,420</span>
                </div>

                <div class="u-p-medium">
                  <div class="c-chart">
                    <div class="payouts-chart"></div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="c-card" data-mh="dashboard3-cards">
                <h4>Top Customer</h4>
                <p class="u-mb-medium">Lorem ipsum dolor sit amet, elit.</p>

                <div class="o-line u-pb-small u-mb-small u-border-bottom">
                  <div class="o-media">
                    <div class="o-media__img u-mr-small">
                      <div class="c-avatar c-avatar--xsmall">
                        <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Name">
                      </div>
                    </div>

                    <div class="o-media__body">
                      <h6>Justine Henderson</h6>
                      <p>Blink Inc.</p>
                    </div>
                  </div>

                  <h6>$5415
                    <span class="u-color-success u-block">
                      <i class="feather icon-trending-up"></i>
                    </span>
                  </h6>
                </div>

                <div class="o-line u-pb-small u-mb-small u-border-bottom">
                  <div class="o-media">
                    <div class="o-media__img u-mr-small">
                      <div class="c-avatar c-avatar--xsmall">
                        <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Name">
                      </div>
                    </div>

                    <div class="o-media__body">
                      <h6>Waylon Dalton</h6>
                      <p>Pulse ltd</p>
                    </div>
                  </div>

                  <h6>$1520 
                    <span class="u-color-danger u-block">
                      <i class="feather icon-trending-down"></i>
                    </span>
                  </h6>
                </div>

                <div class="o-line u-pb-small u-mb-small u-border-bottom">
                  <div class="o-media">
                    <div class="o-media__img u-mr-small">
                      <div class="c-avatar c-avatar--xsmall">
                        <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Name">
                      </div>
                    </div>

                    <div class="o-media__body">
                      <h6>Warren Hampton</h6>
                      <p>Restful ltd</p>
                    </div>
                  </div>

                  <h6>$520 
                    <span class="u-color-danger u-block">
                      <i class="feather icon-trending-down"></i>
                    </span>
                  </h6>
                </div>

                <div class="o-line">
                  <div class="o-media">
                    <div class="o-media__img u-mr-small">
                      <div class="c-avatar c-avatar--xsmall">
                        <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Name">
                      </div>
                    </div>

                    <div class="o-media__body">
                      <h6>Angela Walker</h6>
                      <p>Contractor Inc.</p>
                    </div>
                  </div>

                  <h6>$4240 
                    <span class="u-color-success u-block">
                      <i class="feather icon-trending-up"></i>
                    </span>
                  </h6>
                </div>
            
              </div>
            </div>

            <div class="col-md-4">
              <div class="c-card" data-mh="dashboard3-cards">
                <h4>Global Revenue</h4>
                <p class="u-mb-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                <p class="u-mb-xsmall">United States</p>
                <div class="c-progress c-progress--info c-progress--medium u-mb-small">
                  <div class="c-progress__bar" style="width:75%;"></div>
                </div>

                <p class="u-mb-xsmall">Germany</p>
                <div class="c-progress c-progress--warning c-progress--medium u-mb-small">
                  <div class="c-progress__bar" style="width:25%;"></div>
                </div>

                <p class="u-mb-xsmall">United Kingdom</p>
                <div class="c-progress c-progress--success c-progress--medium u-mb-small">
                  <div class="c-progress__bar" style="width:45%;"></div>
                </div>

                <p class="u-mb-xsmall">Russia</p>
                <div class="c-progress c-progress--info c-progress--medium">
                  <div class="c-progress__bar" style="width:45%;"></div>
                </div>

                <p class="u-mb-xsmall">Australia</p>
                <div class="c-progress c-progress--danger c-progress--medium">
                  <div class="c-progress__bar" style="width:80%;"></div>
                </div>

              </div>
            </div>

            <div class="col-md-4">
              <div class="c-card" data-mh="dashboard3-cards">
                <h4>Recent Activity</h4>
                <p class="u-mb-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <div class="c-feed">
                    <div class="c-feed__item">
                      <p>New order received from Canada by #49832</p>
                    </div>

                    <div class="c-feed__item c-feed__item--success">
                      <p>New order received from Canada by #49832</p>
                    </div>

                    <div class="c-feed__item">
                      <p>New order received from Canada by #49832</p>
                    </div>

                    <div class="c-feed__item c-feed__item--danger">
                      <p>New order received from Canada by #49832</p>
                    </div>
                  </div><!-- // .c-feed -->
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="c-table-responsive@wide">
                <table class="c-table">
                  <thead class="c-table__head">
                    <tr class="c-table__row">
                      <th class="c-table__cell c-table__cell--head">Customer</th>
                      <th class="c-table__cell c-table__cell--head">Company</th>
                      <th class="c-table__cell c-table__cell--head">Lead Score</th>
                      <th class="c-table__cell c-table__cell--head">Date</th>
                      <th class="c-table__cell c-table__cell--head">Tags</th>
                      <th class="c-table__cell c-table__cell--head">Actions</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="c-table__row">
                      <td class="c-table__cell">
                        <div class="o-media">
                          <div class="o-media__img u-mr-xsmall">
                            <div class="c-avatar c-avatar--small">
                              <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Jessica Alba">
                            </div>
                          </div>
                          <div class="o-media__body">
                            <h6>Adam Sandler</h6>
                            <p>Graphic Designer</p>
                          </div>
                        </div>
                      </td>
                      <td class="c-table__cell">Pinterest</td>
                      <th class="c-table__cell">223</th>
                      <td class="c-table__cell">19-11-2018</td>
                      <td class="c-table__cell">
                        <a class="c-badge c-badge--small c-badge--info" href="#">sketch</a>
                        <a class="c-badge c-badge--small c-badge--info" href="#">ui</a>
                        <a class="c-badge c-badge--small c-badge--fancy" href="#">ux</a>
                      </td>
                      <td class="c-table__cell">
                        <div class="c-dropdown dropdown">
                          <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More <i class="feather icon-chevron-down"></i>
                          </a>

                          <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable1">
                            <a class="c-dropdown__item dropdown-item" href="#">Link One</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Two</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Three</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="c-table__row">
                      <td class="c-table__cell">
                        <div class="o-media">
                          <div class="o-media__img u-mr-xsmall">
                            <div class="c-avatar c-avatar--small">
                              <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Jessica Alba">
                            </div>
                          </div>
                          <div class="o-media__body">
                            <h6>Adam Sandler</h6>
                            <p>Copy Writer</p>
                          </div>
                        </div>
                      </td>
                      <td class="c-table__cell">Facebook</td>
                      <th class="c-table__cell">134</th>
                      <td class="c-table__cell">28-2-2018</td>
                      <td class="c-table__cell">
                        <a class="c-badge c-badge--small c-badge--warning" href="#">research</a>
                        <a class="c-badge c-badge--small c-badge--success" href="#">docs</a>
                      </td>
                      <td class="c-table__cell">
                        <div class="c-dropdown dropdown">
                          <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More <i class="feather icon-chevron-down"></i>
                          </a>

                          <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable2">
                            <a class="c-dropdown__item dropdown-item" href="#">Link One</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Two</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Three</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="c-table__row">
                      <td class="c-table__cell">
                        <div class="o-media">
                          <div class="o-media__img u-mr-xsmall">
                            <div class="c-avatar c-avatar--small">
                              <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Jessica Alba">
                            </div>
                          </div>
                          <div class="o-media__body">
                            <h6>Adam Sandler</h6>
                            <p>Marketing Dir.</p>
                          </div>
                        </div>
                      </td>
                      <td class="c-table__cell">Spotify</td>
                      <th class="c-table__cell">165</th>
                      <td class="c-table__cell">17-8-2018</td>
                      <td class="c-table__cell">
                        <a class="c-badge c-badge--small c-badge--fancy" href="#">marketing</a>
                        <a class="c-badge c-badge--small c-badge--info" href="#">seo</a>
                      </td>
                      <td class="c-table__cell">
                        <div class="c-dropdown dropdown">
                          <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More <i class="feather icon-chevron-down"></i>
                          </a>

                          <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable3">
                            <a class="c-dropdown__item dropdown-item" href="#">Link One</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Two</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Three</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="c-table__row">
                      <td class="c-table__cell">
                        <div class="o-media">
                          <div class="o-media__img u-mr-xsmall">
                            <div class="c-avatar c-avatar--small">
                              <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Jessica Alba">
                            </div>
                          </div>
                          <div class="o-media__body">
                            <h6>Adam Sandler</h6>
                            <p>Front-end Developer</p>
                          </div>
                        </div>
                      </td>
                      <td class="c-table__cell">Google</td>
                      <th class="c-table__cell">235</th>
                      <td class="c-table__cell">14-3-2018</td>
                      <td class="c-table__cell">
                        <a class="c-badge c-badge--small c-badge--info" href="#">html</a>
                        <a class="c-badge c-badge--small c-badge--info" href="#">css</a>
                        <a class="c-badge c-badge--small c-badge--fancy" href="#">javascript</a>
                      </td>
                      <td class="c-table__cell">
                        <div class="c-dropdown dropdown">
                          <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More <i class="feather icon-chevron-down"></i>
                          </a>

                          <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable4">
                            <a class="c-dropdown__item dropdown-item" href="#">Link One</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Two</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Three</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="c-table__row">
                      <td class="c-table__cell">
                        <div class="o-media">
                          <div class="o-media__img u-mr-xsmall">
                            <div class="c-avatar c-avatar--small">
                              <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Jessica Alba">
                            </div>
                          </div>
                          <div class="o-media__body">
                            <h6>Adam Sandler</h6>
                            <p>Backend Developer</p>
                          </div>
                        </div>
                      </td>
                      <td class="c-table__cell">Twitter</td>
                      <th class="c-table__cell">113</th>
                      <td class="c-table__cell">14-7-2018</td>
                      <td class="c-table__cell">
                        <a class="c-badge c-badge--small c-badge--info" href="#">php</a>
                        <a class="c-badge c-badge--small c-badge--danger" href="#">nodejs</a>
                        <a class="c-badge c-badge--small c-badge--success" href="#">server</a>
                      </td>
                      <td class="c-table__cell">
                        <div class="c-dropdown dropdown">
                          <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More <i class="feather icon-chevron-down"></i>
                          </a>

                          <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable5">
                            <a class="c-dropdown__item dropdown-item" href="#">Link One</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Two</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Three</a>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="c-table__row">
                      <td class="c-table__cell">
                        <div class="o-media">
                          <div class="o-media__img u-mr-xsmall">
                            <div class="c-avatar c-avatar--small">
                              <img class="c-avatar__img" src="http://via.placeholder.com/72" alt="Jessica Alba">
                            </div>
                          </div>
                          <div class="o-media__body">
                            <h6>Adam Sandler</h6>
                            <p>Marketer.</p>
                          </div>
                        </div>
                      </td>
                      <td class="c-table__cell">Apple</td>
                      <th class="c-table__cell">230</th>
                      <td class="c-table__cell">22-2-2018</td>
                      <td class="c-table__cell">
                        <a class="c-badge c-badge--small c-badge--warning" href="#">docs</a>
                        <a class="c-badge c-badge--small c-badge--danger" href="#">content</a>
                        <a class="c-badge c-badge--small c-badge--success" href="#">seo</a>
                      </td>
                      <td class="c-table__cell">
                        <div class="c-dropdown dropdown">
                          <a href="#" class="c-btn c-btn--info has-icon dropdown-toggle" id="dropdownMenuTable6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More <i class="feather icon-chevron-down"></i>
                          </a>

                          <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuTable6">
                            <a class="c-dropdown__item dropdown-item" href="#">Link One</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Two</a>
                            <a class="c-dropdown__item dropdown-item" href="#">Link Three</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-12">
              <footer class="c-footer">
                <p>© 2018 Neat, Inc</p>
                <span class="c-footer__divider">|</span>
                <nav>
                  <a class="c-footer__link" href="#">Terms</a>
                  <a class="c-footer__link" href="#">Privacy</a>
                  <a class="c-footer__link" href="#">FAQ</a>
                  <a class="c-footer__link" href="#">Help</a>
                </nav>
              </footer>
            </div>
          </div>
        </div>
      </main>
    </div>

    <!-- Main JavaScript -->
    {{-- <script src="js/neat.min.js?v=1.0"></script> --}}
  </body>
</html>