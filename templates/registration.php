<?php $this->layout('layout', ['title' => 'eGovPH App Launching and eLGU Kick-off, Province of Batanes']) ?>

<?php $this->start('head') ?>

<style>
  .ratio-5x1 {
    --bs-aspect-ratio: 20%;
  }
</style>

<script>
  function form() {
    return {
      signaturePad: null,

      init() {
        const canvas = this.$refs.canvas;
        this.signaturePad = new SignaturePad(canvas, {
          backgroundColor: 'rgb(255, 255, 255)'
        });

        const resizeCanvas = () => {
          const ratio = Math.max(window.devicePixelRatio || 1, 1);
          canvas.width = canvas.offsetWidth * ratio;
          canvas.height = canvas.offsetHeight * ratio;
          canvas.getContext("2d").scale(ratio, ratio);
          this.signaturePad.fromData(this.signaturePad.toData());
        }

        window.addEventListener("resize", resizeCanvas);
        resizeCanvas();
      },

      submit() {
        window.location = this.signaturePad.toDataURL('image/jpeg');
      },

    }
  }

  document.addEventListener('alpine:init', () => {
    Alpine.data('form', form);
  });
</script>
<?php $this->stop() ?>

<div class="modal fade" tabindex="-1" id="privacy">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Privacy Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          (R.A. 10173): We need your personal data to provide verifiable evidence in support of this event and that you participated therein. We will include your data in our printed and electronic reports that we will send through secured channels.
        </p>
        <p>
          By signing herein, we will continuously keep your data under lock and key, and will limit their use to authorized staff. If you do not agree, please inform us and we will permanently destroy your data after we have sent our reports.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row gx-5">
    <div class="col-12 mb-4 col-xl-6">
      <img src="assets/banner.png" alt="logos" class="img-fluid">

      <p><strong>Mabuhay!</strong></p>
      <p>
        We are honored to have your presence in this milestone event, the
        <strong>eGovPH App Launching and eLGU Kick-off, Province of Batanes.</strong>
      </p>
      <p>
        The eGov PH, also known as the e-Government Philippines, is a mobile application
        that simplifies transactions between the government and citizens. With a vision
        to build a connected nation, this platform integrates the multi-sectoral government
        through a one-stop online system that will minimize economic cost for the citizens.
      </p>
      <p>
        The eLGU is one of the systems that can be accessed through the eGOV App allowing
        people from all over the Philippines access the public services of their City
        or Municipality, anytime, anywhere. They can renew business permits, get work
        permits, process certificates, and etc.
      </p>
      <p>
        As you fill in your names and affix your signature, may you appreciate the historic
        transformation you are part of today as we move towards becoming a “Bayang Digital”.
      </p>
      <p>
        Kindly fill out this Online Attendance form accurately to confirm your presence.
        Thank you for being here and being one with us in the dawning of the Philippines’
        empowered governance through technology and digitalization.
      </p>
    </div>
    <div class="col-12 mb-5 col-xl-6 mt-5">
      <h1 class="col-12 mb-4 fw-semibold">Guest Registration</h1>
      <form action="#" method="post" class="row" x-data="form" @submit.prevent="submit">
        <div class="col-12 mb-3">
          <label for="name" class="form-label"><small>Complete Name</small></label>
          <input type="text" placeholder="your complete name" name="name" id="name" class="form-control" required>
        </div>
        <div class="col-12 mb-3 col-md-6">
          <label for="agency" class="form-label"><small>Agency / LGU / School / Organization</small></label>
          <input type="text" placeholder="your agency / lgu name / school" name="agency" id="agency" class="form-control" required>
        </div>
        <div class="col-12 mb-3 col-md-6">
          <label for="designation" class="form-label"><small>Designation</small></label>
          <input type="text" placeholder="your designation" name="designation" id="designation" class="form-control" required>
        </div>
        <div class="col-12 mb-3 col-md-6">
          <label for="email" class="form-label"><small>Email Address</small></label>
          <input type="email" placeholder="your email address" name="email" id="email" class="form-control" required>
        </div>
        <div class="col-12 mb-3 col-md-6">
          <label for="phone" class="form-label"><small>Mobile number</small></label>
          <input type="tel" placeholder="your designation" name="phone" id="phone" class="form-control" reuqired>
        </div>
        <div class="col-12 mb-3">
          <label for="signature-pad" class="form-label"><small>Signature</small></label>
          <div class="ratio ratio-5x1 mb-3">
            <canvas x-ref="canvas" id="signature-pad" class="form-control w-full h-full"></canvas>
          </div>
          <button type="button" class="btn btn-sm btn-secondary" @click="signaturePad.clear()">Clear signature</button>
        </div>
        <div class="col-12 mb-3">
          <small>
            By submitting this form, I agree to the collection and processing of my data stated in this
            <a role="button" class="btn-link" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#privacy">Privacy Notice</a>
          </small>
        </div>
        <div class="col-12">
          <button type="submit" class="w-100 btn btn-primary">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
