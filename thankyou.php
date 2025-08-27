<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>StreetStyle Offer Popup</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    /* Modal styling */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      align-items: center;
      justify-content: center;
      animation: fadeIn 0.3s ease-in-out;
    }

    .modal-content {
      position: relative;
      background: #fff;
      padding: 40px 30px;
      border-radius: 16px;
      text-align: center;
      max-width: 90%;
      width: 420px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
      animation: scaleIn 0.3s ease-in-out;
    }

    .modal h2 {
      margin-top: 0;
      font-size: 26px;
      color: #111;
    }

    .modal h3 {
      font-size: 18px;
      color: #e60023;
      margin-bottom: 12px;
    }

    .modal p {
      font-size: 16px;
      color: #444;
      line-height: 1.5;
      margin: 0 0 24px 0;
    }

    .modal .coupon {
      font-size: 18px;
      font-weight: bold;
      color: #1a1a1a;
      background-color: #f5f5f5;
      padding: 10px 16px;
      border-radius: 8px;
      display: inline-block;
      margin-bottom: 20px;
    }

    .modal button {
      padding: 14px 28px;
      background-color: #e1306c;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .modal button:hover {
      background-color: #c1275b;
    }

    .close-btn {
      position: absolute;
      top: 12px;
      right: 16px;
      font-size: 24px;
      font-weight: bold;
      color: #888;
      cursor: pointer;
    }

    .close-btn:hover {
      color: #000;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes scaleIn {
      from { transform: scale(0.95); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>

  <iframe src="https://streetstylestore.com/"></iframe>

  <!-- Modal -->
  <div id="instaModal" class="modal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">×</span>
      <h2>🎉 Congratulations!</h2>
      <h3>You're Now Eligible for a FREE Product</h3>
      <p class="coupon"></p>
      <button onclick="closeModal()">
        Shop Now
      </button>
    </div>
  </div>

  <script>
    function closeModal() {
      document.getElementById('instaModal').style.display = 'none';
    }

    function generateCouponCode(length = 8) {
      const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      let code = '';
      for (let i = 0; i < length; i++) {
        code += characters.charAt(Math.floor(Math.random() * characters.length));
      }
      return code;
    }

    // Show the modal and generate coupon on page load
    window.onload = function() {
      document.getElementById('instaModal').style.display = 'flex';

      const coupon = generateCouponCode();
      const couponElement = document.querySelector('.coupon');
      couponElement.innerHTML = `Your Coupon Code: <strong>${coupon}</strong>`;
    };
  </script>

</body>
</html>
