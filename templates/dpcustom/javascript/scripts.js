$(function() {
    $("#logout-submit").click(function() {
        if (confirm('Are you sure that you want to log out?')) {
            $('#logout-form').submit();
        }
        
        return false;
    });
});