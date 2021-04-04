<html>
<head>
  <style>

  .container {
    display: flex;
    flex-flow: row;
    min-height: 50px;
    width: 80%;

  }

  .main {
    width: 80%;
    background-color: red;
    display: flex;
    flex-direction: column;
    flex: 1;
    margin: 10px;
  }
  .col {
    margin: 2px;
  }
  .top {
      background: yellow;
    }
  .middle {

      background: pink;
    }

  .right {
    flex:1;
    background-color: green;
    margin: 10px;
  }

  </style>
</head>

<body>
  <div class="container">
  <section class="main">
    <div class="col top">a</div>
    <div class="col middle">b</div>
  </section>
  <nav class="nav right">right</nav>
</div>

</body>
</html>
