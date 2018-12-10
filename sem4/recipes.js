$(document).ready(function () {


    // logs user in
$("form#login").submit(function (event) {
    event.preventDefault();
    var data = {
        login: "login",
        username: $('#login-name').val(),
        password: $('#login-pass').val(),
        receptid: $('#login-receptid').val(),
    };
        $.ajax({
        type: 'POST',
        url : '/do-login.php',
        data : data,
            success : function(re){
                if( data.username.toUpperCase() == re.toUpperCase()){
                    getComment(data.receptid);
                    $("#loggedin").append(" " +data.username);
                    $("#comment-right").load(" #comment-right");
                    $("#logout").load(" #logout");
                    $("#comment").load(" #comment");
                    getComment(data.receptid);
                   
                }
                else{ 
                    $("#login-message").text(re);
                }
           
                }
            });
        });

//posts comment
    $('body').on('submit', 'form#comment',function(event){
        event.preventDefault();
    
        var data = {
            commentsubmit: "comment-submit",
            receptId: $('#comment-receptid').val(),
            comment: $('textarea#comment-text').val(),
        };   
    $.ajax({
        type: 'POST',
        url : '/do-comment.php',
        data : data,
        success : function(re){
            console.log(re);
            $("#comment-message").text(re);
            getComment(data.receptId);
            }
        });
    });

    // loggs out user.
    $('body').on('click','#loggedin', function(event){
        event.preventDefault();
        $.ajax({
            type: 'GET',
            url : '/do-logout.php',
            success : function(re){
                window.location.href = '/index.php';
            }
        });
    }); 
        // Calls comment function when page loads.
        getComment($("#login-receptid").val());
        //calls comment function when user is logged in, for when user refreshes website ..
        getComment($("#comment-receptid").val());
        // gets comments from database and calls addEntry for each comment.
        function getComment(id){
            $.ajax({
             type: 'post',
             url : 'commentshow.php',
             data: {receptid: id},
             dataType: "json",
             
             success : function(comments){
                $("#comment-box").html("");
                 for(var i = 0; i < comments.length; i++){
                    addEntry(comments[i]);
                 }
             }
            
            });
        }
        
          //Creates and shows comments on the webiste.
          function addEntry(comment){
            
            if (removeQuotes(comment.username) === removeQuotes(getNickName())) {
               $("<p id ='delete' class ='delete-form>").appendTo($("#comment-box"));
                $("<input id='postid' type='hidden' name='postid' value ="+removeQuotes(comment.postid)+">").appendTo($("#comment-box"));
                $("<input id='receptid' type='hidden' name='receptid' value ="+removeQuotes(comment.receptId)+">").appendTo($("#comment-box"));
                $("<button id = 'delete' class = 'buttons' name = 'comment-delete' type = 'submit'> Delete </button></p>").one("click", deleteComment).appendTo($("#comment-box"));
               
            } 
            $("<p class ='comment-user' id = 'commet-user'> "+removeQuotes(comment.username) +" commented:</p>").appendTo($("#comment-box"));      
            $("<p class ='comment-text' id ='comment-text'>"+removeQuotes(comment.text)+"</p>").appendTo($("#comment-box"));
           
               
            }
            //DELETE specific comment
             function deleteComment(){
                var data = {
                    postid: $('#postid').val(),
                    receptid: $('#receptid').val()
                    };
                    console.log(data.postid);
                    console.log(data.receptid);
            
                $.ajax({
                    type: 'POST',
                    url : '/do-deletecomment.php',
                    data : data,
                    dataType: "json",
                    success : function(re){
                        
                        getComment(data.receptid);
                        $("#comment-message").text(re);
                        
                    }
                    });
        }
            //removes quotes
            function removeQuotes(str) {
                return str.replace(/\"/g, "");
            }
            //gets nickname from dom
            function getNickName() {
            
                return $("#loggedin").text().substring(9);
               
                
            }      
    
            
    });

    