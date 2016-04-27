<div class="col-sm-4">
<h1>comments oooh big boy</h1>
    <?=form_open('main/comment_add');?>

    <?=form_hidden('ReportID', $this->uri->segment(3));?>

    <p><textarea name="Comments" rows="10"></textarea></p>
    <p><input type="submit" value="add comment" /></p>


    </form>
</div>
