<!DOCTYPE html>
<html lang="en">
<head>
    <Title>
    
    </Title>
    
</head>
<style>

    body{
      background: #f2f2f2;
      font-family: 'Open Sans', sans-serif;
    }

    .search {
      width: 100%;
      position: relative
    }

    .searchTerm {
      float: left;
      width: 100%;
      border: 3px solid #00B4CC;
      padding: 5px;
      height: 80px;
      border-radius: 5px;
      outline: none;
      color: #9DBFAF;
    }

    .searchTerm:focus{
      color: #00B4CC;
    }

    .searchButton {
      position: absolute;  
      right: -50px;
      width: 40px;
      height: 36px;
      border: 1px solid #00B4CC;
      background: #00B4CC;
      text-align: center;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      font-size: 20px;
    }

    /*Resize the wrap to see the search bar change!*/
    .wrap{
      width: 100%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

     #myMap {
        width: 500px;
        height: 500px;
      }


</style>
</html>

