<!DOCTYPE html>
<html>
<head>
    <title>MathJax TeX to MathML Page</title>
    <script>
        function toMathML(jax,callback) {
            var mml;
            try {
                mml = jax.root.toMathML("");
            } catch(err) {
                if (!err.restart) {throw err} // an actual error
                return MathJax.Callback.After([toMathML,jax,callback],err.restart);
            }
            MathJax.Callback(callback)(mml);
        }
    </script>
    <script type="text/x-mathjax-config">
          MathJax.Hub.Config({
            tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
          });
          MathJax.Hub.Queue(
            function () {
              var jax = MathJax.Hub.getAllJax();
              for (var i = 0; i < jax.length; i++) {
                toMathML(jax[i],function (mml) {
                  alert(jax[i].originalText + "\n\n=>\n\n"+ mml);
                });
              }
            }
          );
        </script>
    <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML-full
"></script>
</head>
<body>
<p>
    When $a \ne 0$, there are two solutions to \(ax^2 + bx + c = 0\) and
    they are
    $$x = {-b \pm \sqrt{b^2-4ac} \over 2a}.$$
</p>
</body>
</html>