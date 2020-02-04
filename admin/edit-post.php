
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="view-posts.php">Posts</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>
                        <form method="post" action="#" role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="Lorem ipsum dolor sit amet.">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option selected disabled>- Select Status -</option>
                                        <option value="published" selected>Published</option>
                                        <option value="unpublished">Unpublished</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control" id="tags" name="tags" value="tag1, tag2">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option selected disabled>- Select Category -</option>
                                        <option value="published" selected>News</option>
                                        <option value="health">Health</option>
                                        <option value="planet-earth">Planet Earth</option>
                                        <option value="strange-news">Strange News</option>
                                        <option value="space-and-physics">Space & Physics</option>
                                        <option value="animals">Animals</option>
                                        <option value="history">History</option>
                                        <option value="tech">Tech</option>
                                        <option value="culture">Culture</option>
                                    </select>
                                </div>
                                <p>
                                    <img src="https://via.placeholder.com/250x120" alt="">
                                </p>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo" name="photo" required>
                                        <label class="custom-file-label" for="photo">Choose file...</label>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="description">Description</label>
                                    <textarea class="form-control textarea" id="description" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequatur debitis dignissimos dolore doloremque est fuga in iste laboriosam libero molestias numquam, omnis perspiciatis quam qui quisquam repellat, repudiandae sunt vitae voluptas? Alias aspernatur assumenda beatae earum enim exercitationem expedita explicabo facilis, fuga fugiat illum inventore, ipsam laudantium magni maxime modi mollitia nam natus nobis numquam officia officiis, quam quasi quis quos sapiente similique temporibus veritatis voluptatibus voluptatum! Accusantium alias aliquam assumenda at atque aut, beatae consectetur cum cumque delectus ducimus eos et explicabo fugit in ipsa iusto magnam maiores nemo neque nobis, officia omnis placeat quaerat repudiandae saepe similique tempore temporibus veritatis vitae. Incidunt, iure nostrum? Aut consectetur explicabo fugiat harum mollitia recusandae reiciendis, ullam voluptates. Aliquam autem consequuntur dolore excepturi hic molestiae necessitatibus quas recusandae repellendus, sunt. Deserunt distinctio ducimus enim ex, explicabo facilis iure non, nulla optio perspiciatis quibusdam quidem repellat sed tenetur voluptas voluptate voluptates! Aliquam.</textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm btn-flat">Add</button>
                                <button type="reset" class="btn btn-info btn-sm btn-flat">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>