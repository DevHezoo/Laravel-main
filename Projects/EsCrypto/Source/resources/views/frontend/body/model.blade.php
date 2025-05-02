           
<div class="modal fade" id="about" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
        <button class="btn btn-sm btn-circle d-flex flex-center transition-base fw-semi-bold" data-bs-dismiss="modal" aria-label="Close" type="button" onclick="acceptCookies()">Ok</button>
      </div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel fw-semi-bold">{{session('Seo')->meta_title}}</h4>
          <p class="fs--2 mb-0">Welcome good to see you: <a style="color: white;" class="fw-semi-bold">with us</a></p>
        </div>
        <div class="p-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0 fw-semi-bold">Categories</h5>
                  <div class="d-flex"><span class="badge me-1 py-2 badge-soft-danger fw-semi-bold">Proxy</span><span class="badge me-1 py-2 badge-soft-danger fw-semi-bold">Multi-Accounts</span><span class="badge me-1 py-2 badge-soft-danger fw-semi-bold">Script</span><span class="badge me-1 py-2 badge-soft-danger fw-semi-bold">Ads-Block</span>
                  </div>
                  <hr class="my-4" />
                </div>
              </div>
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0 fw-semi-bold">Description</h5>
                  <!-- Updated to use full width -->
                  <p class="text-word-break fs--1 fw-semi-bold">Dear Visitor,</p>

                  <p class="text-word-break fs--1 fw-semi-bold">Greetings and a warm welcome to the {{session('Seo')->meta_title}} website. We trust this message finds you in good health and high spirits.</p>

                  <p class="text-word-break fs--1 fw-semi-bold">At {{session('Seo')->meta_title}}, we take pride in presenting numerous opportunities for substantial income, complemented by daily limits to enhance your financial prospects. To gain a comprehensive understanding of the manifold advantages we offer, we encourage you to peruse our meticulously crafted documentations. These resources elucidate the terms and intricacies of our system, serving as a valuable guide for your journey with us.</p>

                  <p class="text-word-break fs--1 fw-semi-bold">In our commitment to fostering a fair and secure environment, we kindly request your adherence to our outlined guidelines. To ensure a seamless experience and to safeguard the integrity of our platform, we strictly prohibit the use of VPNs, multi-accounts, scripts, and ad blockers. Violation of these terms may result in permanent suspension from our system.</p>

                  <p class="text-word-break fs--1 fw-semi-bold">We firmly believe that adhering to legal methods is not only a requirement but a winning strategy for a prosperous collaboration. Your commitment to compliance will undoubtedly contribute to a mutually beneficial partnership.</p>

                  <p class="text-word-break fs--1 fw-semi-bold">In conclusion, we extend our gratitude for taking the time to familiarize yourself with our instructions. Should you have any further inquiries or require clarification, our dedicated Escrypto Team is at your disposal.</p>

                  <p class="text-word-break fs--1 fw-semi-bold">We could use third party cookies to personalize content, ads and analyze site traffic.</p>

                  <p class="text-word-break fs--1 fw-semi-bold">Best Regards,<br>{{session('Seo')->meta_title}} Team.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@auth
<div class="modal fade" id="adsblock" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel">Ads-Block Detected</h4>
          <p class="fs--2 mb-0">Warning by <a style="color: white;" class="fw-semi-bold">System</a></p>
        </div>
        <div class="p-4">
          <div class="row">
            <div class="col-lg-9">
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0">Categories</h5>
                  <div class="d-flex"><span class="badge me-1 py-2 badge-soft-primary">Proxy</span><span class="badge me-1 py-2 badge-soft-primary">Multi-Accounts</span><span class="badge me-1 py-2 badge-soft-primary">Script</span><span class="badge me-1 py-2 badge-soft-success">Ads-Block</span>
                  </div>
                  <hr class="my-4" />
                </div>
              </div>
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0">Description</h5>
                  <p class="text-word-break fs--1">Ads-Block detected. Kindly Turn Off Your Ads-Block. Please read our terms and conditions. </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 text-center">
              <h6 class="mt-5 mt-lg-0">More</h6>
              <ul class="nav flex-lg-column fs--1">
<li class="nav-item me-2 me-lg-0">
    <a class="nav-link nav-link-card-details" type="button" onclick="window.location.href='/contact'">
            <span class="nav-link-icon">
                <span class="fa fa-envelope-open"></span>
            </span>
            <span class="nav-link-text ps-1">Contact</span>
    </a>
</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--  -->

<div class="modal fade" id="vpn" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel">Proxy Detected</h4>
          <p class="fs--2 mb-0">Warning by <a style="color: white;" class="fw-semi-bold">System</a></p>
        </div>
        <div class="p-4">
          <div class="row">
            <div class="col-lg-9">
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0">Categories</h5>
                  <div class="d-flex"><span class="badge me-1 py-2 badge-soft-success">Proxy</span><span class="badge me-1 py-2 badge-soft-primary">Multi-Accounts</span><span class="badge me-1 py-2 badge-soft-primary">Script</span><span class="badge me-1 py-2 badge-soft-primary">Ads-Block</span>
                  </div>
                  <hr class="my-4" />
                </div>
              </div>
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0">Description</h5>
                  <p class="text-word-break fs--1">VPN detected. We can't guarantee how many warnings are left, as your account may be terminated soon. Please read our terms and conditions. </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 text-center">
              <h6 class="mt-5 mt-lg-0">More</h6>
              <ul class="nav flex-lg-column fs--1">
<li class="nav-item me-2 me-lg-0">
    <a class="nav-link nav-link-card-details" type="button" onclick="window.location.href='/contact'">
            <span class="nav-link-icon">
                <span class="fa fa-envelope-open"></span>
            </span>
            <span class="nav-link-text ps-1">Contact</span>
    </a>
</li>


              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--  -->

<div class="modal fade" id="multiacc" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
          <h4 class="mb-1" id="staticBackdropLabel">Multi-Account Detected</h4>
          <p class="fs--2 mb-0">Warning by <a style="color: white;" class="fw-semi-bold">System</a></p>
        </div>
        <div class="p-4">
          <div class="row">
            <div class="col-lg-9">
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0">Categories</h5>
                  <div class="d-flex"><span class="badge me-1 py-2 badge-soft-primary">Proxy</span><span class="badge me-1 py-2 badge-soft-success">Multi-Accounts</span><span class="badge me-1 py-2 badge-soft-primary">Script</span><span class="badge me-1 py-2 badge-soft-primary">Ads-Block</span>
                  </div>
                  <hr class="my-4" />
                </div>
              </div>
              <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-0">Description</h5>
                  <p class="text-word-break fs--1">Multi-Account detected. We guarantee that your account has been terminated. Please read our terms and conditions. </p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 text-center">
              <h6 class="mt-5 mt-lg-0">More</h6>
              <ul class="nav flex-lg-column fs--1">
<li class="nav-item me-2 me-lg-0">
    <a class="nav-link nav-link-card-details" type="button" onclick="window.location.href='/contact'">
            <span class="nav-link-icon">
                <span class="fa fa-envelope-open"></span>
            </span>
            <span class="nav-link-text ps-1">Contact</span>
    </a>
</li>


              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endauth
