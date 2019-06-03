<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="/css/app.css">
  
</head>
<body style="background-color:lightgreen">

<div class="wrapper">
    <div class="container">
        <div class="jumbotron col-md-10 offset-md-1 mt-3 bg-dark pt-4 pb-4">
          <div class="row">
            <div class="col-md-8">
              <div class="container">
                 <h1 class="display-4 text-white">exportDATA</h1>
                 <p class="lead text-white" style="font-size:16px;">
                 Step 1. Add as many data as you wish (Username must be unique).
                 <br>Step 2. Click "Submit" to save the data.
                 <br>Step 3. Cick "Export" to export data to Microsoft Excel.
                 <br>Step 4. Finish</p>
              </div>
            </div>
              <img src="{{url('/img/excel.png')}}" style="height:150px;width:150px">
          </div>
          </div>
        </div>  

      <div class="content-wrapper">
        <div class="content" id="app">
                  <router-view></router-view> 
        </div>
      </div>
    </div>
</div>


<script src="/js/app.js">
</script>
</body>
</html>
