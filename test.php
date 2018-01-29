<!doctype html>
<html>
    <head>
            <meta charset="utf-8"/>
            <style>
                    #edit , #edit:focus{
                            transition: box-shadow 2s;
                        }
                    #edit , #result{
                            width: 500px;
                            height: 500px;
                            border: 1px solid black;
                            outline: none;
                            font-size: 25px;
                            box-shadow: 3px 3px 6px black;
                        }
                    #edit:focus{
                            border: 1px solid orange;
                            box-shadow: 3px 3px 6px darkorange;
                        }
                    #edit a{
                            cursor: pointer;
                        }
                </style>
        </head>
    <body>
        <div id="btns">
                 Couleur du texte<input type="color" id="couleur"/><br/>
                 <button id="bold">Gras</button>
                 <button id="italic">Italic</button>
                 <button id="url">Inserer url</button>
                 <button id="img">Insert image</button>
            </div>
        <div contenteditable="true" id="edit"></div>
        <button id="show_result">Afficher le résultat</button>
        <div id="result"></div>
        <script>
    var edit = document.getElementById("edit")
    var btns = document.getElementById("btns")
    var editColor = btns.querySelector("#couleur")
    var editBold = btns.querySelector("#bold")
    var editItalic = btns.querySelector("#italic")
    var editLink = btns.querySelector("#url")
    var editImg = btns.querySelector("#img")
    function setColor(couleur){
        document.execCommand('styleWithCSS', false, true);
        document.execCommand('foreColor', false, couleur);
    }
    setColor(editColor.value)

    editColor.addEventListener("change" , function(event){
        setColor(editColor.value)
    })
    editBold.addEventListener("click" , function(event){
        document.execCommand("bold", false, null)
    })
    editItalic.addEventListener("click" , function(event){
        document.execCommand("italic" , false , null)
    })
    editLink.addEventListener("click" , function(event){
        var link = prompt("lien a ajouter")
        var linkTxt = prompt("text cliquable du lien")
        edit.innerHTML = edit.innerHTML + "<a target='_blank' href=" + link + ">" + linkTxt + "</a>"
    })
    editImg.addEventListener("click" , function(event){
        var linkImg = prompt("lien de l'image")
        edit.innerHTML = edit.innerHTML + "<img src='"+linkImg+"'/>"
    })
    var res = document.getElementById("result")
    var btnres = document.getElementById("show_result")
    btnres.addEventListener("click" , function(event){
        res.innerHTML = edit.innerHTML
    })
</script>
    </body>
</html>