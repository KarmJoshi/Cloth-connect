<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pending Delivery</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400,600&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Your Existing CSS -->
  <link rel="stylesheet" href="/assets/css/animate.css">
  <link rel="stylesheet" href="/assets/css/icomoon.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/flexslider.css">
  <link rel="stylesheet" href="assets/css/HomePageClientCard.css">
  <link rel="stylesheet" href="/assets/css/style.css"> 
  <link rel="stylesheet" href="/assets/css/admin_style.css">
  <link rel="stylesheet" href="/assets/css/pop.css"> 

  <style>
  /* Fix Bootstrap modal z-index and force visibility */
  .modal.fade.show {
    display: block !important;
    opacity: 1 !important;
    background: rgba(0, 0, 0, 0.8); /* fallback backdrop */
    z-index: 1055 !important;
  }

  .modal-dialog {
    transform: translate(0, 0) !important;
    margin-top: 10vh;
    z-index: 1060 !important;
  }

  .modal-backdrop.show {
    opacity: 0.5 !important;
    z-index: 1040 !important;
  }

  body.modal-open {
    overflow: hidden !important;
  }
</style>

</head>
<body>

<div id="page">
  <header class="header">
    <div class="logo">Cloth Connect</div>
    <nav>
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="delivery-history">Delivery History</a></li>
        <li><a href="logistics-profile">Profile</a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </nav>
  </header>

  <h1>Panding Delivery</h1>

  <div class="table-container">
    <table>
      <tr>
        <th>Donor Name</th>
        <th>NGO Name</th>
        <th>Pick Up Address</th>
        <th>Drop Address</th>
        <th>Donor ContactNumber</th>
        <th>Date & Time</th>
        <th>Status</th>
      </tr>
      @foreach ($data as $datas)
      <tr>
        <td>{{ $datas->firstname }} {{ $datas->lastname }}</td>
        <td>{{ $datas->NGOname }}</td>
        <td>{{ $datas->pickup_address }}</td>
        <td>{{ $datas->drop_address }}</td>
        <td>{{ $datas->client_mobilenumber }}</td>
        <td>
            <button class="btn btn-glow" data-bs-toggle="modal" data-bs-target="#scheduleModal"   data-did="{{ $datas->DID }}"
            onclick="setDID(this)">
                Pick Date & Time
            </button>
        </td>
        <td>
          <a class="btn btn-glow" href="status-done/{{ $datas->DID }}">{{ $datas->status }}</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="pickup-time" method="post">
    @csrf
    <input type="hidden" name="DID">
      <div class="modal-content p-4">
        <div class="modal-header">
         <input type="hidden" name="DID" id="modalDID">
          <h5 class="modal-title" id="scheduleModalLabel">Schedule a Time Slot</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="date" class="form-label">Select Date</label>
            <input type="date" name="date" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="timeSlot" class="form-label">Select Time Slot</label>
            <select  class="form-select"  name="timeSlot" required>
              <option value="" disabled selected hidden>Select...</option>
              <option value="9AM-1PM">9 AM - 1 PM</option>
              <option value="1PM-5PM">1 PM - 5 PM</option>
              <option value="5PM-9PM">5 PM - 9 PM</option>
            </select>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-glow">Submit</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  function setDID(button) {
    var did = button.getAttribute('data-did');
    document.getElementById('modalDID').value = did;
  }
</script>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/jquery.easing.1.3.js"></script>
<script src="/assets/js/jquery.waypoints.min.js"></script>
<script src="/assets/js/jquery.stellar.min.js"></script>
<script src="/assets/js/jquery.flexslider-min.js"></script>
<script src="/assets/js/zoomerang.js"></script>
<script src="/assets/js/main.js"></script>

@if(session('error'))
<script>
  alert("{{ session('error') }}");
</script>
@endif

</body>
</html>
