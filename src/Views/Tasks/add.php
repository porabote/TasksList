<form action="/tasks/add/" style="padding: 30px;" method="POST">

    <h1>Добавление задачи</h1>


    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="user_name" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputName1">Name</label>
            <input name="user_email"  type="text" class="form-control" id="exampleInputName1" required
                   data-bv-notempty-message="The username is required" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label for="exampleInputName1">Description</label>
        <textarea name="task_body"  type="text" class="form-control" id="exampleInputName1" required
                  data-bv-notempty-message="The username is required" placeholder="Description"></textarea>
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>