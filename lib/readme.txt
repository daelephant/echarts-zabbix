qunee-min.js and qunee-module.js are the same content, you can use any one of them in the web page as follows:

1. use qunee-min.js
<div style="position: absolute; width: 100%; top: 0px; bottom: 0px;" id="canvas" ></div>
<script src="./lib/qunee-min.js"></script>
<script>
<script>
    var graph = new Q.Graph('canvas');
    var hello = graph.createNode("Hello");
</script>

2. load qunee-module.js by requirejs
<div style="position: absolute; width: 100%; top: 0px; bottom: 0px;" id="canvas" ></div>
<script src="lib/require.js"></script>
<script>
    require.config({
        paths: {
            Q: './lib/qunee-module'
        }
    });
    require(['Q'],
            function (Q) {
                var graph = new Q.Graph('canvas');
                var hello = graph.createNode("Hello");
            });
</script>