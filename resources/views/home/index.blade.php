<!DOCTYPE>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Hello World</title>
    <script src="https://unpkg.com/react@latest/dist/react.js"></script>
    <script src="https://unpkg.com/react-dom@latest/dist/react-dom.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  </head>
  <body>

    <div id="haider"></div>

    
     <script type="text/babel">

      var MessageComponent = React.createClass({

           getMoviesFromApiAsync :function() {
               axios.get('/api/hungryme/getAllItems')
                   .then(function (response) {
                     response : 
                         
                      
                   })
                   .catch(function (error) {
                       console.log(error);
                   });

      },

  render: function() {
    return (

   <button onClick={this. getMoviesFromApiAsync}>Hellow</button>
    );            
  }
});

// Render an instance of MessageComponent into document.body
ReactDOM.render(
  <MessageComponent/>,
  document.getElementById('haider')
);

 
    </script>
  </body>
</html>

