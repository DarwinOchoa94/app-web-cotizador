<!DOCTYPE html>
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Flat UI</title>
  <link rel="stylesheet" href="../css/main_flat.css">
  <link rel="stylesheet" href="../css/demo_flat.css">
</head>
<body>
  <div class="demo">
    <div class="demo-left">
      <p class="demo-buttons">
        <input type="submit" value="Submit" class="button">
        <button class="button button-blue">Send</button>
        <a href="#" class="button button-green">Create</a>
        <a href="#" class="button button-red">Delete</a>
      </p>

      <p class="demo-buttons">
        <a href="#" class="button button-purple">Reload</a>
        <a href="#" class="button button-orange">Undo</a>
        <a href="#" class="button button-dark-blue">Review</a>
        <a href="#" class="button button-black">Accept</a>
      </p>

      <div class="button-group">
        <a href="#" class="button">Settings</a>
        <a href="#" class="button active">Profile</a>
        <a href="#" class="button">Apps</a>
      </div>

      <div class="button-dropdown open">
        <a href="#" class="button">Dropdown</a>
        <a class="button toggle">More</a>
        <ul class="dropdown">
          <li><a href="#" class="dropdown-link">Cut</a></li>
          <li><a href="#" class="dropdown-link">Copy</a></li>
          <li><a href="#" class="dropdown-link">Paste</a></li>
        </ul>
      </div>

      <div class="pagination">
        <a href="#" class="button button-prev">Previous</a>
        <a href="#" class="pagination-link">1</a>
        <a href="#" class="pagination-link">2</a>
        <a href="#" class="pagination-link">3</a>
        <span class="pagination-current">4</span>
        <a href="#" class="pagination-link">5</a>
        <a href="#" class="pagination-link">6</a>
        <a href="#" class="pagination-link">7</a>
        <a href="#" class="button button-next">Next</a>
      </div>

      <div class="heading">
        <h2>Heading</h2>
        <ul class="heading-links">
          <li><a href="#" class="heading-link">Edit</a></li>
          <li><a href="#" class="heading-link">Delete</a></li>
        </ul>
      </div>

      <ul class="breadcrumbs">
        <li><a href="#" class="breadcrumb">Dashboard</a></li>
        <li><a href="#" class="breadcrumb">Projects</a></li>
        <li><a href="#" class="breadcrumb">App</a></li>
        <li><span class="breadcrumb current">Design</span></li>
      </ul>

      <p class="alert notice">
        <strong>Done!</strong> You successfully completed this project.
        <a href="#" class="alert-close">&times;</a>
      </p>

      <p class="alert">
        <strong>Oops!</strong> Something is technically wrong.
        <a href="#" class="alert-close">&times;</a>
      </p>
    </div>

    <div class="demo-center">
      <p><input type="text" placeholder="Placeholder…"></p>
      <p class="valid"><input type="email" value="valid@email.com"></p>
      <p class="invalid"><input type="email" value="invalid email"></p>
      <p><textarea autofocus></textarea></p>
      <p class="search"><input type="search" placeholder="Search…"></p>
    </div>

    <div class="demo-right">
      <p class="demo-switch">
        <span class="switch switch-square">
          <input type="checkbox" id="s1">
          <label for="s1" data-on="I" data-off="O"></label>
        </span>

        <span class="switch switch-square">
          <input type="checkbox" id="s2" checked>
          <label for="s2" data-on="I" data-off="O"></label>
        </span>

        <span class="switch switch-square switch-green">
          <input type="checkbox" id="s3" checked>
          <label for="s3" data-on="I" data-off="O"></label>
        </span>
      </p>

      <p class="demo-switch">
        <span class="switch">
          <input type="checkbox" id="s4">
          <label for="s4" data-on="On" data-off="Off"></label>
        </span>

        <span class="switch">
          <input type="checkbox" id="s5" checked>
          <label for="s5" data-on="On" data-off="Off"></label>
        </span>

        <span class="switch switch-green">
          <input type="checkbox" id="s6" checked>
          <label for="s6" data-on="On" data-off="Off"></label>
        </span>
      </p>

      <p class="demo-options">
        <label class="option">
          <input type="checkbox">
          <span class="checkbox"></span>
        </label>

        <label class="option">
          <input type="checkbox" class="focus">
          <span class="checkbox"></span>
        </label>

        <label class="option">
          <input type="checkbox" checked>
          <span class="checkbox"></span>
        </label>

        <label class="option">
          <input type="checkbox" class="focus" checked>
          <span class="checkbox"></span>
        </label>
      </p>

      <p class="demo-options">
        <label class="option">
          <input type="radio" name="radio1">
          <span class="radio"></span>
        </label>

        <label class="option">
          <input type="radio" name="radio2" class="focus">
          <span class="radio"></span>
        </label>

        <label class="option">
          <input type="radio" name="radio1" checked>
          <span class="radio"></span>
        </label>

        <label class="option">
          <input type="radio" name="radio2" class="focus" checked>
          <span class="radio"></span>
        </label>
      </p>

      <div class="tooltip tooltip-up">Tooltip</div>

      <div class="select">
        <select>
          <option selected>Select…</option>
          <option>One</option>
          <option>Two</option>
          <option>Three</option>
        </select>
      </div>

      <div class="progress">
        <span style="width: 33%"></span>
      </div>

      <div class="progress progress-green">
        <span style="width: 66%"></span>
      </div>
    </div>

    <table class="table">
      <thead class="table-head">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Status</th>
          <th>Views</th>
        </tr>
      </thead>
      <tbody class="table-body">
        <tr>
          <td>1</td>
          <td>Lorem ipsum dolor sit amet</td>
          <td>Published</td>
          <td>4215</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Consectetur adipiscing elit</td>
          <td>Draft</td>
          <td>-</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Integer molestie lorem at massa</td>
          <td>Published</td>
          <td>2316</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
