<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multiple Maps</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      input.form-control{
        box-sizing: inherit;
      }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Multiple Maps</h1><hr>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <h3>Lokasi Muat</h3>
              
         
        
              <table class="table dynatable Umum" id="tabelmuat">
                  <thead>
                      <tr>
                          <th class="text-center">Alamat Muat</th>
                          <th class="text-center">Kota</th>
                          <th class="text-center">Rencana Muat</th>
                          <th class="text-center">Nama Kontak</th>
                          <th class="text-center">Nomor Kontak</th>
                          <th class="text-center">Keterangan</th>
                      </tr>
                  </thead>
                  <tbody id="p_scents1">
                      <tr>
                          <td id="cari0"><input type="text" name="alamat_muat[]"  id="searchBox0"/></td>
                          <td><select name="kota_asal[]" class="form-control kota" required></select></td>
                          <td><input type="date" name="tgl_muat[]" class="form-control" required/></td>
                          <td><input type="text" name="nama_pic_muat[]" class="form-control"/></td>
                          <td><input type="number" maxlength="15" name="hp_pic_muat[]" class="form-control"/></td>
                          <td><input type="text" name="ket_muat[]" class="form-control"/></td>
                      </tr>
                  </tbody>
              </table>
               <a class="btn btn-primary hilang" id="addScnt1"><span class="glyphicon glyphicon-plus"></span> Tambah Asal</a>
            </div>
        </div>
        
        <hr>
        <h3>Lokasi Bongkar</h3>
        <table class=" dynatable Umum" id="tabelbongkar">
            <thead>
                <tr>
                    <th class="text-center">Alamat Bongkar</th>
                    <th class="text-center">Kota</th>
                    <th class="text-center">Rencana Bongkar</th>
                    <th class="text-center">Nama Kontak</th>
                    <th class="text-center">Nomor Kontak</th>
                    <th class="text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody id="p_scents2">
                <tr>
                    <td id="cari_0"><input type="text" name="alamat_bongkar[]" id="searchBox_0"  required></td>
                    <td><select name="kota_tujuan[]" class="form-control kota" required></select></td>
                    <td><input type="date" name="tgl_bongkar[]" class="form-control" required></td>
                    <td><input type="text" name="nama_pic_bongkar[]" class="form-control"></td>
                    <td><input type="number" maxlength="15" name="hp_pic_bongkar[]" class="form-control"></td>
                    <td><input type="text" name="ket_bongkar[]" class="form-control"></td>
                </tr>
            </tbody>
        </table>
            <button class="btn btn-primary hilang" id="addScnt2" role="button"><span class="glyphicon glyphicon-plus"></span> Tambah Tujuan</button>
        
    </div>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>

</html>


<script src="https://www.bing.com/api/maps/mapcontrol?key=AjwUEXFZA8SMyy8CaJj59vJKVDoWohNXVFz_uGyHlT8N40Jgr-zrhvcxbTNRyDqn&callback=bingMapsReady"></script>

<script type="text/javascript">
function bingMapsReady() {
    Microsoft.Maps.loadModule("Microsoft.Maps.AutoSuggest", {
        callback: onLoad,
        errorCallback: logError,
        credentials: 'Ap12Gwv9esg5iXgfAh5Ehlbf36MZ-O8051Sl66Zm6glGwq7PSaaKgGPpcOUEGICy'
    });

    function onLoad() {
        var options = {
            maxResults: 5
        };

        var tbmuat = document.getElementById("tabelmuat");
        var jumlahmuat = tbmuat.tBodies[0].rows.length;
        for(i=0; i<jumlahmuat; i++){
          initAutosuggestControl(options, "searchBox"+i, "cari"+i);
        }

        var tbbongkar = document.getElementById("tabelbongkar");
        var jumlahbongkar = tbbongkar.tBodies[0].rows.length;
        for(i=0; i<jumlahbongkar; i++){
          initAutosuggestControl(options, "searchBox_"+i, "cari_"+i);
        }
        
        
    }
}

function initAutosuggestControl(options, suggestionBoxId, suggestionContainerId) {
    var manager = new Microsoft.Maps.AutosuggestManager(options);
    manager.attachAutosuggest("#" + suggestionBoxId, "#" + suggestionContainerId, selectedSuggestion);

    function selectedSuggestion(suggestionResult) {
        document.getElementById(suggestionBoxId).innerHTML = suggestionResult.formattedSuggestion;
        console.log(suggestionResult.location);
    }
}


function logError(message) {
    console.log(message);
}


var scntDiv1 = $('#p_scents1');
var i = $('#p_scents1 tr').size() + 1;

$('#addScnt1').click(function() {
    scntDiv1.append(
      '<tr>' +
        '<td id="cari'+i+'"><input type="text" name="alamat_muat[]"  required id="searchBox'+i+'"></td>' +
        '<td><select name="kota_asal[]" class="form-control kota" required></select></td>' +
        '<td><input type="date" name="tgl_muat[]" class="form-control" required></td>' +
        '<td><input type="text" name="nama_pic_muat[]" class="form-control"></td>' +
        '<td><input type="number" name="hp_pic_muat[]" class="form-control"></td>' +
        '<td><input type="text" name="ket_muat[]" class="form-control"></td>' +
        '<td><button type="button" id="remScnt1" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td>' +
        '</tr>'
    );
    bingMapsReady();
    i++;   
    return false;
});

//Remove button
$(document).on('click', '#remScnt1', function() {
    if (i > 1) {
        $(this).closest('tr').remove();
        i--;
    }
    return false;
});



var scntDiv2 = $('#p_scents2');
var i = $('#p_scents2 tr').size() + 1;

$('#addScnt2').click(function() {
    scntDiv2.append(
      '<tr>' +
        '<td id="cari_'+i+'"><input type="text" name="alamat_bongkar[]" required id="searchBox_'+i+'"></td>' +
        '<td><select name="kota_tujuan[]" class="form-control kota" required></select></td>' +
        '<td><input type="date" name="tgl_bongkar[]" class="form-control" required></td>' +
        '<td><input type="text" name="nama_pic_bongkar[]" class="form-control" required></td>' +
        '<td><input type="number" name="hp_pic_bongkar[]" class="form-control" required></td>' +
        '<td><input type="text" name="ket_bongkar[]" class="form-control" required></td>' +
        '<td><button type="button" id="remScnt2" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td>' +
      '</tr>'
    );
    
    i++;
    bingMapsReady();
    return false;
});

//Remove button
$(document).on('click', '#remScnt2', function() {
    if (i > 1) {
        $(this).closest('tr').remove();
        i--;
    }
    return false;
});




</script>