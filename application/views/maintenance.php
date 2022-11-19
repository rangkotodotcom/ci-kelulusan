<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url('assets/') ?>img/icon.png" type="image/png">
    <meta charset="UTF-8" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
    <style>
        body {
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            text-align: justify;
        }

        .container {
            max-width: 800px;
            margin: 8% auto;
            border: solid 1px #7FFF00;
            padding: 20px;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            -moz-box-shadow: 0 0 34px #000;
            -webkit-box-shadow: 0 0 34px #000;
            box-shadow: 0 0 34px #8FBC8F;
        }
    </style>

</head>

<body class="background" bottommargin="0" topmargin="0" leftmargin="0" rightmargin="0">
    <div class="container">
        <div>
            <h3 style="text-align:center"><b>Informasi Maintenance Sistem</b></h3>
        </div>
        <style type="text/css">
            .ahgcrewstyle {
                color: #F00;
            }

            .ahg {
                color: #0F0;
            }

            #message font strong {
                font-family: Tahoma, Geneva, sans-serif;
                font-size: 18px;
            }

            .gre {
                color: #9F3;
                font-size: 36px;
            }

            #message font {
                font-size: 16px;
            }
        </style>
        </head>

        <body alink="white" bgcolor="black" vlink="white" link="white" text="white">
            <p></p>
            <center>
                <center></center>
                <script type="text/javascript">
                    TypingText = function(element, interval, cursor, finishedCallback) {
                        if ((typeof document.getElementById == "undefined") || (typeof element.innerHTML == "undefined")) {
                            this.running = true;
                            return;
                        }
                        this.element = element;
                        this.finishedCallback = (finishedCallback ? finishedCallback : function() {
                            return;
                        });
                        this.interval = (typeof interval == "undefined" ? 100 : interval);
                        this.origText = this.element.innerHTML;
                        this.unparsedOrigText = this.origText;
                        this.cursor = (cursor ? cursor : "");
                        this.currentText = "";
                        this.currentChar = 0;
                        this.element.typingText = this;
                        if (this.element.id == "") this.element.id = "typingtext" + TypingText.currentIndex++;
                        TypingText.all.push(this);
                        this.running = false;
                        this.inTag = false;
                        this.tagBuffer = "";
                        this.inHTMLEntity = false;
                        this.HTMLEntityBuffer = "";
                    }
                    TypingText.all = new Array();
                    TypingText.currentIndex = 0;
                    TypingText.runAll = function() {
                        for (var i = 0; i < TypingText.all.length; i++) TypingText.all[i].run();
                    }
                    TypingText.prototype.run = function() {
                        if (this.running) return;
                        if (typeof this.origText == "undefined") {
                            setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
                            return;
                        }
                        if (this.currentText == "") this.element.innerHTML = "";
                        if (this.currentChar < this.origText.length) {
                            if (this.origText.charAt(this.currentChar) == "<" && !this.inTag) {
                                this.tagBuffer = "<";
                                this.inTag = true;
                                this.currentChar++;
                                this.run();
                                return;
                            } else if (this.origText.charAt(this.currentChar) == ">" && this.inTag) {
                                this.tagBuffer += ">";
                                this.inTag = false;
                                this.currentText += this.tagBuffer;
                                this.currentChar++;
                                this.run();
                                return;
                            } else if (this.inTag) {
                                this.tagBuffer += this.origText.charAt(this.currentChar);
                                this.currentChar++;
                                this.run();
                                return;
                            } else if (this.origText.charAt(this.currentChar) == "&" && !this.inHTMLEntity) {
                                this.HTMLEntityBuffer = "&";
                                this.inHTMLEntity = true;
                                this.currentChar++;
                                this.run();
                                return;
                            } else if (this.origText.charAt(this.currentChar) == ";" && this.inHTMLEntity) {
                                this.HTMLEntityBuffer += ";";
                                this.inHTMLEntity = false;
                                this.currentText += this.HTMLEntityBuffer;
                                this.currentChar++;
                                this.run();
                                return;
                            } else if (this.inHTMLEntity) {
                                this.HTMLEntityBuffer += this.origText.charAt(this.currentChar);
                                this.currentChar++;
                                this.run();
                                return;
                            } else {
                                this.currentText += this.origText.charAt(this.currentChar);
                            }
                            this.element.innerHTML = this.currentText;
                            this.element.innerHTML += (this.currentChar < this.origText.length - 1 ? (typeof this.cursor == "function" ? this.cursor(this.currentText) : this.cursor) : "");
                            this.currentChar++;
                            setTimeout("document.getElementById('" + this.element.id + "').typingText.run()", this.interval);
                        } else {
                            this.currentText = "";
                            this.currentChar = 0;
                            this.running = false;
                            this.finishedCallback();
                        }
                    }
                </script>
                <p id="message">
                    <font>Dengan berat hati kami menyampaikan informasi ini kepada anda,bahwa untuk sementara Pengumuman Kelulusan Siswa <?= $profilsekolah["nama_sekolah"] ?> sedang dalam perbaikan.
                    </font>
                </p>
                <script type="text/javascript">
                    new TypingText(document.getElementById("message"), 50, function(i) {
                        var ar = new Array(".", "..", "...", "..", ".");
                        return " " + ar[i.length % ar.length];
                    });
                    TypingText.runAll();
                </script>


                <style>
                    .responsive {
                        max-width: 100%;
                        height: auto;
                    }
                </style>
                <img src="<?= base_url('assets/') ?>img/main.gif" class="responsive" width="600" height="400">
    </div>
</body>

</html>