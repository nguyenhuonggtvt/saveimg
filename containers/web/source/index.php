<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Save image</title>
        <script src="/js/jquery-3.5.1.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>

        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row mb-3 mt-3">
                <div class="col-12">
                    <div class="input-group p-5" id="box-form">
                        <input type="text" class="form-control" id="txtLinkImg" placeholder="Link website" aria-label="Link website" aria-describedby="button-save">
                        <div class="input-group-append">
                            <button class="btn btn-warning" type="button" id="button-save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div id="box-alert" class="alert alert-warning text-center d-none" role="alert">Proccessing...</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            List Images <span id="count_img"></span>
                        </div>
                        <div class="card-body">
                            <div class="row" id="list-img">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>