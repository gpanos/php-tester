<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PhP Tester</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="wrapper">
                <header><h1>Write you code here</h1></header>
                <div class="container">
                    <form method="post">
                        <textarea name="code" 
                                  cols="50" 
                                  rows="20" 
                                  id="code"
                                  autofocus
                                  onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}"
                        ><?php echo '<?php';echo isset($_POST['code'])?'':"&#13;&#10;";?><?= isset($_POST['code'])?ltrim( $_POST['code'], '<?php' ):'' ?></textarea><br>
                        <input type="submit">
                    </form>
                </div>
                <h3>Result:</h3>
                <div class="result">
                    <?php 
                        $result = $_POST['code'];
                        
                        $result = trim ( $result );
                        $result = ltrim( $result, '<?php' );    
                        $result = rtrim( $result, '?>' );
                    ?>
                    <p style="color:green;"><?php eval($result); ?></p>
                    
                </div>
            </div>  
        </div>
        
        <script>
            function moveCaretToEnd(el) {
                if (typeof el.selectionStart == "number") {
                    el.selectionStart = el.selectionEnd = el.value.length;
                } else if (typeof el.createTextRange != "undefined") {
                    el.focus();
                    var range = el.createTextRange();
                    range.collapse(false);
                    range.select();
                }
            }
            var textarea = document.getElementById("code");
            textarea.onfocus = function() {
                moveCaretToEnd(textarea);
                // Work around Chrome's little problem
                window.setTimeout(function() {
                    moveCaretToEnd(textarea);
                }, 1);
            };
        </script>
    </body>
</html>
