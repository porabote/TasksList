<form  style="padding: 30px;" method="POST">

    <h1>Редактирование задачи</h1>

    <input type="hidden" name="id" value="<?=$this->data['record']['id']?>">

    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="user_email" value="<?=$this->data['record']['user_email']?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input name="user_name" value="<?=$this->data['record']['user_name']?>"  type="text" class="form-control" id="exampleInputName1" required
               data-bv-notempty-message="The username is required" placeholder="Enter name">
    </div>

    <div class="form-group">
        <label for="exampleInputName1">Description</label>
        <textarea name="task_body" type="text" class="form-control" id="exampleInputName1" required
                  data-bv-notempty-message="The username is required" placeholder="Description"><?=$this->data['record']['task_body']?></textarea>
    </div>

    <div class="form-group form-check">
        <input name="completed" value="0" type="hidden" class="form-check-input" id="exampleCheck1">
        <input name="completed" value="1" <?=($this->data['record']['completed']) ? 'checked="checked"' : ''?> type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label"  for="exampleCheck1">Check me out</label>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>