<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets3/style.css">
    <title>Result Submission</title>
</head>
<body>
    <h3>Enter collected information to accomplish Task</h3>
    <form action="{{route('store')}}" method="post">
      @csrf
  <div class="wrapper">
    <div id="survey_options">
      <input type="hidden" name="AgentIdHidden" value="{{$info_data->id}}">
      <input type="text" name="TaskName" class="survey_options" size="50" value="{{$info_data->TaskName}}" placeholder="Enter Task Name Completed" required>
      <input type="text" name="AgentName" class="survey_options" size="50" placeholder="Enter Agent Name" required>
    </div>
    <div class="controls">
      <a href="#" id="add_more_fields"><span style="color: green"><i class="fa fa-plus"></i>Add More</a></span>
      <a href="#" id="remove_fields"><span style="color: red"><i class="fa fa-plus"></i>Remove Field</a></span>
    </div>
  
    <button type="submit">Submit</button>
  </form>
  </div>

  <script src="/assets3/script.js"></script>
</body>
</html>