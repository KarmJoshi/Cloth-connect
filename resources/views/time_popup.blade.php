<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Advanced Booking Modal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: radial-gradient(circle at top, #0d0d0d 0%, #1c1c1c 100%);
      font-family: 'Outfit', sans-serif;
      color: #fff;
      overflow-x: hidden;
    }

    .btn-glow {
      background: linear-gradient(135deg, #ff0033, #ff4e50);
      border: none;
      color: #fff;
      font-weight: 600;
      padding: 12px 28px;
      font-size: 16px;
      border-radius: 50px;
      box-shadow: 0 0 12px rgba(255, 0, 51, 0.6);
      transition: all 0.3s ease-in-out;
    }

    .btn-glow:hover {
      background: linear-gradient(135deg, #ff4e50, #ff0033);
      box-shadow: 0 0 24px rgba(255, 0, 51, 0.8);
      transform: scale(1.05);
    }

    .modal-content {
      background: rgba(30, 30, 30, 0.95);
      border: 1px solid rgba(255, 0, 51, 0.2);
      backdrop-filter: blur(16px);
      border-radius: 20px;
      box-shadow: 0 0 30px rgba(255, 0, 51, 0.3);
      animation: fadeScale 0.4s ease;
    }

    @keyframes fadeScale {
      from {
        opacity: 0;
        transform: scale(0.9);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .modal-title {
      font-size: 22px;
      font-weight: 600;
      color: #ff4e50;
    }

    .floating-label {
      position: relative;
      margin-bottom: 1.5rem;
    }

    .floating-label input,
    .floating-label select {
      background: transparent;
      border: 1px solid #555;
      border-radius: 10px;
      width: 100%;
      padding: 14px 12px 6px;
      font-size: 16px;
      color: #fff;
      outline: none;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .floating-label input:focus,
    .floating-label select:focus {
      border-color: #ff4e50;
      box-shadow: 0 0 8px rgba(255, 0, 51, 0.6);
    }

    .floating-label label {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(30, 30, 30, 0.95);
      padding: 0 4px;
      color: #aaa;
      transition: 0.2s ease;
      pointer-events: none;
    }

    .floating-label input:focus + label,
    .floating-label input:not(:placeholder-shown) + label,
    .floating-label select:focus + label,
    .floating-label select:not([value=""]) + label {
      top: -10px;
      font-size: 13px;
      color: #ff4e50;
    }

    select option {
      background-color: #1c1c1c;
      color: #fff;
    }

    .modal-footer .btn {
      border-radius: 50px;
      padding: 10px 20px;
    }

    .btn-close {
      filter: invert(1);
    }

    @media (max-width: 576px) {
      .modal-dialog {
        margin: 1.75rem auto;
      }
    }
  </style>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <!-- Modal -->
  <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form>
        <div class="modal-content p-4">
          <div class="modal-header">
            <h5 class="modal-title" id="scheduleModalLabel">Schedule a Time Slot</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <!-- Date Picker -->
            <div class="floating-label">
              <input type="date" id="date" class="form-control" placeholder=" " required>
              <label for="date">Select Date</label>
            </div>

            <!-- Time Slot Dropdown -->
            <div class="floating-label">
              <select id="timeSlot" class="form-select" required>
                <option value="" disabled selected hidden></option>
                <option value="9am-1pm">9 AM - 1 PM</option>
                <option value="1pm-5pm">1 PM - 5 PM</option>
                <option value="5pm-9pm">5 PM - 9 PM</option>
              </select>
              <label for="timeSlot">Select Time Slot</label>
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

</body>
</html>
