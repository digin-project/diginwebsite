<?php require "fragments/head.php"; ?>
<body>
	<?php require "fragments/nav.php"; ?>

    <section class="container">
        <div class="row">
            <form onsubmit="return false;">
                <div class="col l2">
                    <input type="text" id="billing-host" readonly value>
                </div>
                <div class="col l2">
                    <input type="text" onkeyup="updateBilling(this, 'amount')" id="billing-amount" placeholder="Amount (default: empty)">
                </div>
                <div class="col l2">
                    <input type="text" onkeyup="updateBilling(this, 'curency')" id="billing-curency" placeholder="Curency (default: cad)">
                </div>
                <div class="col l2">
                    <input type="text" onkeyup="updateBilling(this, 'id')" id="billing-id" placeholder="ID (default: empty)">
                </div>
                <div class="col l1">
                    <button class="btn" type="submit" id="billing-create">Générer</button>
                </div>
                <div class="col l3">
                    <input type="text" id="billing-url" placeholder="Url generated">
                </div>
            </form>
        </div>
    </section>

    <?php require "fragments/script.php"; ?>
    <script type="text/javascript">
        var bhost = document.getElementById("billing-host");
        var bamount = document.getElementById("billing-amount");
        var bcurency = document.getElementById("billing-curency");
        var bid = document.getElementById("billing-id");
        var bcreate = document.getElementById("billing-create");
        var burl = document.getElementById("billing-url");
        var bcollection = {};
        var billing;

        function getHostName() { billing = bhost.value = (window.location.origin + "/billing/") || (location.protocol + '//' + location.hostname + "/billing/"); }
        function updateBilling(self, type) { return (self.value == null || self.value === "") ? delete bcollection[type] : bcollection[type] = self.value; }

        bcreate.addEventListener("click", function() {
            var _tmp = billing;
            var _lg = Object.keys(bcollection).length;
            var _symbol = _lg == 1 ? "?" : "&";
            var index = 0;

            for(var i in bcollection) { _tmp += (index == 0 ? "?" : _symbol) + i + "=" + bcollection[i]; index++ }
            return burl.value = _tmp;
        });

        getHostName();
    </script>
</body>
</html>
