const contactFormSnapshot = `<form novalidate="novalidate">
  <div id="contact-success" class="alert alert-success" style="display: none;">Form submitted successfully</div>
  <div class="mb-3"><label for="name">Name <span class="text-muted">(required)</span></label> <input name="name" type="text" id="name" placeholder="John Smith" class="form-control">
    <!---->
  </div>
  <div class="mb-3"><label for="email">Email <span class="text-muted">(required)</span></label> <input name="email" type="email" id="email" placeholder="you@example.com" class="form-control">
    <!---->
  </div>
  <div class="mb-3"><label for="phone">Phone <span class="text-muted">(required)</span></label> <input name="phone" type="text" id="phone" placeholder="123-456-7890" class="form-control">
    <!---->
  </div>
  <div class="mb-3"><label for="message">Message <span class="text-muted">(required)</span></label> <textarea name="message" type="text" id="message" placeholder="Message..." class="form-control"></textarea>
    <!---->
  </div> <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>`;
export default contactFormSnapshot;