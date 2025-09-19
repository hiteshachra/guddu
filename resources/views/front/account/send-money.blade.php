@extends('front.layouts.app')
@section('content')
@if($device == 'android')
<script src="https://unpkg.com/html5-qrcode"></script>
<div class="row my-3 d-flex justify-content-center" id="scanner">

    <div class="col-12 col-md-6 col-lg-5">
        <div id="qr-reader" style="width: 100%; max-width: 400px; margin: auto;"></div>        
        <!-- 📸 Upload from Gallery -->
        <div class="text-center mt-3">
            <input type="file" accept="image/*" onchange="scanQrFromFile(this)" style="display:none;" id="fileInput">
            <button onclick="document.getElementById('fileInput').click()" class="btn btn-primary">📁 Upload from Gallery</button>
        </div>

        <!-- 🔦 Flash Toggle -->
        <div class="text-center mt-2">
            <button id="flashBtn" class="btn btn-warning">🔦 FLASH OFF</button>
        </div>

        <!-- ✅ Response -->
        <div id="qr-response" class="mt-4 text-center text-success fw-bold"></div>
        <div id="qr-reader-temp" style="display:none;"></div>
    </div>
</div>
@elseif($device == 'pc')
<div class="row my-3" id="scanner">
    <!-- Step 2: Payment Screen -->
    <div class="col-12 col-md-6 col-lg-5">
      <h3 style="text-align:center;">Enter Number</h3>

      <div class="form-floating mb-3">
        <input type="number" id="phoneNumber" class="form-control" placeholder="Enter Number" required />
        <label for="amount">Enter Number</label>
      </div>

      <button onclick="send()" class="btn btn-primary w-100">Send</button>
    </div>
</div>
@endif
<div class="card">
    <div class="card-body p-3">
        <div class="row gy-3" id="paymentScreen" style="display: none;">
            <!-- Step 2: Payment Screen -->
            <div class="col-12">
                <h3 style="text-align:center;">Send Point Request</h3>
            </div>
            <div class="col-12 pt-4">
                <p class=""><strong>Shopping Amount:</strong><span id="payTo"></span></p>
                <input type="number" class="trasparent-input text-center" name="amount" id="amount" value="{{old('amount')}}" placeholder="Enter sAmount" style="background-color: rgba(0, 0, 0, 0.1); outline: none;" min="1" max="1000000000">
                @error('amount')
                    <span  class="error invalid-feedback">{{ $message }}</span>
                @enderror
                <input type="hidden" id="phone_number" required />
            </div>
            <div class="col-12">
                Amount in words -: <span id="amount_in_words"></span>
            </div>
            <div class="col-12">
       <!--        <div class="form-floating mb-3">
                <input type="number" id="amount" class="form-control" placeholder="Enter Shopping Amount" required />
                <input type="hidden" id="phone_number" required />
                <label for="amount">Enter Amount</label>
              </div> -->

              <button onclick="makePayment()" class="btn btn-primary w-100 mt-3">Send Request</button>
            </div>
        </div>
    </div>
</div>


<script>
let html5QrCode;
let backCameraId = null;
let isFlashOn = false;

// 📷 Get Back Camera ID
function getBackCameraId(devices) {
    for (let device of devices) {
        if (device.label.toLowerCase().includes("back") || device.label.toLowerCase().includes("environment")) {
            return device.id;
        }
    }
    return devices[0]?.id;
}

// ✅ Scan Success
// function onScanSuccess(decodedText) {
//     document.getElementById('qr-response').innerText = "✅ Scanned: " + decodedText;
//     html5QrCode.stop();
// }
function onScanSuccess(decodedText) {
    fetch('{{ url("validate-send-money") }}?qr_data='+decodedText, {
        method: 'GET',
    })
    .then(res => res.json())
    .then(data => {
        if(data['status'] == 'success') {
          document.getElementById("scanner").style.setProperty("display", "none", "important");
          document.getElementById("paymentScreen").style.display = "block";
          document.getElementById("payTo").innerText = data['data']['name'];
          document.getElementById("phone_number").value = data['data']['phone_number'];
        }
        // document.getElementById('qr-response').innerText = data.message;
        // html5QrCode.stop();
    });
}


// 🚀 Init QR Scanner
function initScanner() {

    Html5Qrcode.getCameras().then(devices => {
        if (!devices.length) {
            alert("No cameras found.");
            return;
        }


        backCameraId = getBackCameraId(devices);

        html5QrCode = new Html5Qrcode("qr-reader");

        html5QrCode.start(
            backCameraId,
            {
                fps: 10,
                // qrbox: 250
                qrbox: { width: 250, height: 250 }
            },
            onScanSuccess
        );
    });
}

// 🔦 Toggle Flashlight
document.getElementById('flashBtn').addEventListener('click', () => {
  
    html5QrCode.applyVideoConstraints({
        advanced: [{ torch: !isFlashOn }]
    })
    .then(() => {
        isFlashOn = !isFlashOn;
        document.getElementById('flashBtn').innerText = isFlashOn ? '🔦 Flash ON' : '🔦 Flash OFF';
    })
    .catch(err => {
        alert("⚠️ Flashlight not supported on this camera or browser.");
    });
});

window.addEventListener('load', initScanner);


function scanQrFromFile(input) {
    const file = input.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function () {
        const img = new Image();
        img.src = reader.result;

        img.onload = function () {
            const html5QrCode = new Html5Qrcode("qr-reader-temp");
            html5QrCode.scanFile(file, true)
                .then(decodedText => {
                    console.log(decodedText);
                    onScanSuccess(decodedText);
                    // document.getElementById('qr-result').innerText = "QR Code Data: " + decodedText;
                })
                .catch(err => {
                    // document.getElementById('qr-result').innerText = "Error: " + err;
                });
        };
    };
    reader.readAsDataURL(file);
}

function makePayment() {
  const amount = document.getElementById("amount").value;
  const phone_number = document.getElementById("phone_number").value;

  if (amount <= 0) {
    alert("Enter a valid amount");
    return;
  }
  
   fetch('{{ url("send-money") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ "phone_number": phone_number,  "amount":amount})
    })
    .then(res => res.json())
    .then(data => {
        if(data['status'] == 'success') {
            window.location.replace("{{ url('send-money') }}/success/"+data['data']);
            history.pushState(null, "", location.href);
            window.addEventListener("popstate", function () {
                history.pushState(null, "", location.href);
            });
        } else {
            window.location.replace("{{ url('send-money') }}/failed/"+data['data']);
            history.pushState(null, "", location.href);
            window.addEventListener("popstate", function () {
                history.pushState(null, "", location.href);
            });
        }
    });
}

function send() {
    var phone_number = document.getElementById("phoneNumber").value;
    if(phone_number.length != 10) {
        alert('Please enter valid phone number');
    } else {
        var data = `{"email":"","phone_number":${phone_number}}`  
        onScanSuccess(data);
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const amountInput = document.getElementById('amount');
    const amountInWords = document.getElementById('amount_in_words');

    amountInput.addEventListener('keydown', function (e) {
      if (['e', 'E', '+', '-'].includes(e.key)) {
        e.preventDefault();
      }
    });

    amountInput.addEventListener('input', function () {
      const num = parseInt(this.value);
      const min = parseInt(this.min);
      const max = parseInt(this.max);

      if (isNaN(num)) {
          amountInWords.textContent = '';
          return;
        }

        if (num < min) {
          this.value = min;
          num = min;
        } else if (num > max) {
          this.value = max;
          num = max;
        }

        amountInWords.textContent = numberToWords(num);
      });

    function numberToWords(num) {
      const a = [
        '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
        'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen',
        'Seventeen', 'Eighteen', 'Nineteen'
      ];
      const b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

      function inWords(n) {
        if (n < 20) return a[n];
        if (n < 100) return b[Math.floor(n / 10)] + (n % 10 ? ' ' + a[n % 10] : '');
        if (n < 1000) return a[Math.floor(n / 100)] + ' Hundred' + (n % 100 ? ' ' + inWords(n % 100) : '');
        if (n < 100000) return inWords(Math.floor(n / 1000)) + ' Thousand' + (n % 1000 ? ' ' + inWords(n % 1000) : '');
        if (n < 10000000) return inWords(Math.floor(n / 100000)) + ' Lakh' + (n % 100000 ? ' ' + inWords(n % 100000) : '');
        return inWords(Math.floor(n / 10000000)) + ' Crore' + (n % 10000000 ? ' ' + inWords(n % 10000000) : '');
      }

      return inWords(num);
    }
});
</script>

@endsection