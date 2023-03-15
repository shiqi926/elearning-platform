<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!-- NES CSS -->
        <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />

        <!-- VUE -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        
        <!-- External Styling -->
        <link href="../styles.css" rel="stylesheet" />

        <!-- Internal Styling -->
        <style>
        html,body {
            height:100%;
            width:100%;
        }
        body{
            /* background-image: url(../resources/img/stars_no_cloud.png); */
            background-color: #d0e6fb;

            padding-top: 56px;
            display: flex;
        }
        .nes-btn.chapter{
            width: 100%;
            margin-top: 10px;
            transition: transform .2s;
        }
        .nes-btn.chapter:hover {
            transform: scale(1.25); 
        }
        .nes-balloon.summary{
            position: relative;
            z-index: 1;
            background-color: orange;
            display: block;
            text-align: center;
            font-size: smaller;
            padding: 5px;
        }
        .nes-balloon.text{
            position: relative;
            z-index: -1;
        }
        .nes-container.exp{
            background-color: rgb(248, 173, 111);
        }
        iframe{
            width: 50rem;
            height: 30rem;
        }
        </style>
        
        <link rel="icon" href="../resources/img/icon.png">
        <title>Finals Fantasy</title>

    </head>
    <body>
        <!-- Navigation -->
        <?php include '../login/login_header.php'; ?>
        
        <!-- MAIN -->
        <div class="container-fluid" id="app">
            <div class="row mt-4">
                <!-- LEFT SIDE BAR -->
                <div class="col-md-3 pl-5 pr-5">
                    <button type="button" class="nes-btn is-warning is-centered chapter" v-for="(context, chap) in chapters"
                        id="chap" @click="showChapter(chap)" @mouseover="hoverChap1(chap)" @mouseout="hoverChap2">
                        {{chap}}
                    </button>
                    <!-- BOTTOM -->
                    <p class="nes-balloon summary mt-5" :class="{'d-none': hideSummary}">
                        {{hoverSummary}}
                    </p>
                </div>

                <div class="col-md-9 pl-5">
                    <!-- SUBJECT SELECTOR -->
                    <a type="button" class="nes-btn m-2 is-warning" href="#" style="width: 180px;">Math</a>
                    <a type="button" class="nes-btn m-2" href="learning_science.php" style="width: 180px">Science</a>

                    <h2 style="color: orange" class="mt-4" :class="{'d-none': hideText}" > {{selectedSummary}} </h2>
                    <div v-for="pair in selectedText">
        
                        <p class="nes-container is-rounded text exp my-3" :class="{'d-none': hideText}" >
                            {{pair.explanation}} 
                        </p>
                        <p class="nes-container is-rounded text my-3 bg-light" :class="{'d-none': hideText}" >
                            Example:{{pair.example}}
                        </p>
                    </div>
                    <div class="m-5" style="display: flex; justify-content: center;">
                        <iframe style="margin: auto" :class="{'d-none': hideText}" :src="selectedVideo"></iframe>
                    </div>
                </div>
            </div>
        </div>


        <script>

            const vm = new Vue({
                el: '#app',
                data: {
                    chapters: {},
                    selectedText: "",
                    selectedVideo: "",
                    hideText: true,
                    selectedSummary: "",
                    hideSummary: true,
                    hoverSummary: "",
                },
                methods: {
                    // show the body of a chapter when user clicks
                    showChapter: function(chap){
                        this.selectedText = this.chapters[chap].text;
                        this.selectedVideo = this.chapters[chap].video;
                        this.selectedSummary = this.chapters[chap].summary;
                        this.hideText = false;
                        this.hideSummary = true;
                    },
                    // show the summary of chapter when user hovers over
                    hoverChap1: function(chap){
                        const topicindex = this.chapters[chap].summary.indexOf("-");
                        this.hoverSummary = this.chapters[chap].summary.slice(topicindex+2);
                        this.hideSummary = false;
                    },
                    hoverChap2: function(){
                        this.hideSummary = true;
                    },
                    
                },
                mounted: function(){
                    axios.get('getMath.php')
                    .then(response => {
                        this.chapters = response.data;
                    })
                    .catch(error => {
                        this.error = true;
                    });
                }
            })

        </script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
