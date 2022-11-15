
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clock</title>
    <style>
          *
      {
          margin:0;
          padding:0;
          box-sixes: border-box;
      }
      body{
          background-color: #ffdd00;

      }
      .container
      {
            width: 400px;
            height: 400px;
            /*border: 2px solid black;*/
            position:absolute;
            transform: translate(-50%,-50%);
            left:50%;
            top:50%;
            border-radius: 50%;
            box-shadow: 15px 15px 30px #665800,
                          -15px -15px 30px #ffff00;
      }
      .clock
      {
          width: 325px;
          height: 325px;
          /* border: 2px solid black; */
          position: absolute;
          transform: translate(-50%,-50%);
          left: 50%;
          top: 50%;
          background: url(https://cdn.picpng.com/clock/clock-numbers-clock-face-time-58912.png);
          background-size: cover;
          border-radius: 50%;
          box-shadow: inset 15px 15px 30px #665800,
                        inset  -15px -15px 30px #ffff00;
          display: flex;
          justify-content: center;
          align-items: center;               
      }
      .hr {
            width: 150px;
            height: 150px;
      }
      .min {
          width: 200px;
          height: 200px;
      }
      .sec {
          width: 250px;
          height: 250px;
      }
      .hr, .min, .sec {
          /* border: 2px solid black; */
          position: absolute;
          display: flex;
          justify-content: center;

      }
      .clock::before {
            content: '';
            height: 10px;
            width: 10px;
            background-color: black;
            border-radius: 50%;
            border: 2px solid white;

      }
      .hr::before {
          position: absolute;
          content: '';
          width: 8px;
          height: 75px;
          background-color: black;
          z-index: 10;
          border-radius: 50%;
      }
      .min::before {
          position: absolute;
          content: '';
          width: 4px;
          height: 100px;
          background-color: black;
          z-index: 10;
          border-radius: 50%;
      }
      .sec::before {
          position: absolute;
          content: '';
          width: 2px;
          height: 150px;
          background-color: black;
          z-index: 10;
          border-radius: 50%;
      }

          </style>
  </head>
  <body>
    <div class="container">
    <div class="clock">
    <div class="hr" id="hr"></div>
    <div class="min" id="min"></div>
    <div class="sec" id="sec"></div>
  </div>
  </div>
  <script>

const hour=document.getElementById('hr');
        const minute=document.getElementById('min');
        const second=document.getElementById('sec');
         
              setInterval(() => {
          d = new Date(); 
          hr = d.getHours();
          min = d.getMinutes();
          sec = d.getSeconds();
          hr_rotation = 30 * hr + min / 2; 
          min_rotation = 6 * min;
          sec_rotation = 6 * sec;
        
          hour.style.transform = `rotate(${hr_rotation}deg)`;
          minute.style.transform = `rotate(${min_rotation}deg)`;
          second.style.transform = `rotate(${sec_rotation}deg)`;
      }, 1000);
       
   </script>
  </body>
  </html>
