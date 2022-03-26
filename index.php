<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="fakemail , email , fake mail , fake email" />
    <meta name="description" content="FakeMail"/>
    <meta name="subject" content="index"/>
    <meta name="copyright" content="M_A_Tatari" />
    <meta name="language" content="EN" />
    <meta name="robots" content="index, follow" />
    <meta name="topic" content="fakemail" />
    <meta name="owner" content="M_A_Tatari" />
    <link rel="shortcut icon" href="/image.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loading.css">
    <style>
        button {
            box-shadow: none;
        }
    </style>
    <title>fakemail</title>
</head>

<body class="bg-warning bg-opacity-10">
    <div id='alerts' class="container mt-5 d-sm-flex flex-row align-items-center justify-content-around">
        <!--alerts-->
    </div>

    <div class="container mt-md-5 mt-4 pb-md-3 d-sm-flex flex-row align-items-center justify-content-around">
        <h1 class="fs-1 text-danger">Fake Mail</h1>
        <a id='newmail' class='btn btn-success' onclick="sendRequst()">
            Get New fake Mail
        </a>
    </div>
    <hr>
    <div class="container d-sm-flex flex-column align-items-center justify-content-center">
        <p id='title' class='mt-md-5 fs-3'>You don't have any Fake Mail</p>
        <p id='email' class="fw-bold fs-4 mt-4 text-primary text-uppercase"></p>
        <a onclick='showmessage()' style='display:none' id='show' class='btn btn-secondary  position-relative' data-bs-toggle="modal" data-bs-target="#showmessage">Show Messages
            <!--
            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
         -->
        </a>
        <!-- Modal -->
        <div class="modal fade" id="showmessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showmessageLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showmessageLabel">Messages</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div id='modalBody' class="modal-body">
                        <!--messages-->
                        <div id='messages' class='text-break'></div>
                        <!--loader-->
                        <div id='loader'>
                            <div class="loader">
                                <svg viewBox="0 0 80 80">
                                    <circle id="test" cx="40" cy="40" r="32"></circle>
                                </svg>
                            </div>

                            <div class="loader triangle">
                                <svg viewBox="0 0 86 80">
                                    <polygon points="43 8 79 72 7 72"></polygon>
                                </svg>
                            </div>

                            <div class="loader">
                                <svg viewBox="0 0 80 80">
                                    <rect x="8" y="8" width="64" height="64"></rect>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src='js/script.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>