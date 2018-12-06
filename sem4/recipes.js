$(document).ready(function () {


    // logs user in
$("form#login").submit(function (event) {
    event.preventDefault();
    
    var data = {
        login: "login",
        username: $('#login-name').val(),
        password: $('#login-pass').val()
    };
    
        $.ajax({
        
        type: 'POST',
        url : '../../do-login.php',
        data : data,
            success : function(re){
                if( data.username.toUpperCase() == re.toUpperCase()){
    
                    $("#loggedin").append(" " +data.username);
                    var logged = 1;
                    $("#comment-right").load(" #comment-right");
                    $("#logout").load(" #logout");
                    $("#comment").load(" #comment");
                    getComment();
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
        comment: $('#comment-text').val()
    };
    
        $.ajax({
        
        type: 'POST',
        url : '../../do-comment.php',
        data : data,
            success : function(re){
                $("#comment-message").text(re);
                getComment();
                }
            });
        });

    // loggs out user.
    $('body').on('click','#loggedin', function(event){
    event.preventDefault();
    
    
        $.ajax({
        
        type: 'GET',
        url : '../../do-logout.php',
    
            success : function(re){
                var logged = 0;
                window.location.href = '/index.php';
                }
            });
        });

        // Deletes comment
        $('body').on("submit","#delete",function(event){
            event.preventDefault();
            getComment();
            var data = {
                commentdelete: "commentdelete",
                postid: $('#postid').val(),
                };
        
            $.ajax({
                type: 'POST',
                url : '/do-deletecomment.php',
                data : data,
                success : function(re){
                    getComment();
                    $("#comment-message").text(re);
                }
                });
            });
     
    });
    
    // gets comments
    function getComment(){
        $.ajax({
         type: 'POST',
         url : 'commentshow.php',
         success : function(re){
             $("#column-left").html(re);
             
         }
 
        });
    }
