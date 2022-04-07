<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
</head>
<?php
if (!isset($Search)) { //&& !$db->query($Search)
    echo "Aucuns marker à afficher";
} else {
    $array = [];
    foreach ($db_pdo->query($Search) as $row) {
        $array[] = $row;
    }
?>
    <div id="map-canvas"></div>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <script type="text/javascript">
        window.MARKERLIST = <?= json_encode($array) ?>;

        function initMap() {
            var mymap = L.map("map-canvas").setView([49.8942, 2.2957], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                minZoom: 1,
                maxZoom: 18,
            }).addTo(mymap);
            // array.forEach(element => {

            // });
            <?php foreach ($array as $row) {
                $donnees = 'var marker' .
                    ' = L.marker([' . $row['latitude'] .
                    ', ' . $row['longitude'] .
                    ']).bindPopup("' . $row['libelle'] . '").addTo(mymap);';
                echo $donnees;
            } ?>

        }
        window.onload = function() {
            initMap();
        };
    </script>

<?php } ?>