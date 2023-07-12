<br>
<br>
<br>
<div class='container mt-5'>
<form method ="POST" action ='/var/www/myProject/public/mail.php'>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label  class="form-label">Subject</label>
        <textarea class="form-control" ></textarea>
        <input name='subject' type='hidden' >
    </div>
    <div class="mb-3">
        <label  class="form-label">Message</label>
        <textarea class="form-control"   rows="3"></textarea>
        <input name='message' type='hidden' >
    </div>
    <button type='submit' class='btn btn-outline-success'> Send </button> 
</form>
</div>

