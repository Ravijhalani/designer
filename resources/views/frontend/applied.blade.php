
@extends('frontend.layout.header')
@section('content')
<div class="dashboard-area pt-120 mb-120">
    <div class="container">
      <div class="row g-lg-4 gy-5 mb-90">
        <div class="col-lg-3">
          <div class="dashboard-sidebar">
            @include('frontend.dashboard-slider')
            
          </div>
        </div>
        <div class="col-lg-9">
          <div class="applied-job-area">
            <div class="table-wrapper">
              <div class="table-title-filter">
                <div class="section-title">
                  <h5>Applied Jobs:</h5>
                </div>
              </div>
              <table class="eg-table table category-table mb-30">
                <thead>
                  <tr>
                    <th>Job Tittle</th>
                    <th>Apply Date</th>
                    <th>Company</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Job Title">
                      <div class="company-info">
                        <div class="logo">
                          <img
                            src="assets/images/bg/company-logo/company-06-2.png"
                            alt=""
                          />
                        </div>
                        <div class="company-details">
                          <div class="top">
                            <h6>
                              <a href="job-details-2.html"
                                >Senior UI/UX Designer</a
                              >
                            </h6>
                            <span
                              ><img
                                src="assets/images/icon/calender2-2.svg"
                                alt=""
                              />
                              1 days ago</span
                            >
                          </div>
                          <ul>
                            <li>
                              <img
                                src="assets/images/icon/location-2.svg"
                                alt=""
                              />New-York, USA
                            </li>
                            <li>
                              <img
                                src="assets/images/icon/arrow2-2.svg"
                                alt=""
                              />
                              <p>
                                <span class="title">Salary:</span> $60-$90 /
                                <span class="time">Per Hour</span>
                              </p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </td>
                    <td data-label="Apply Job">03/07/2022</td>
                    <td data-label="Company">
                      <a class="view-btn" href="company-details-2.html"
                        >Tech.Bath Com...
                      </a>
                    </td>
                    <td data-label="Status">
                      <button class="eg-btn purple-btn">Viewed</button>
                    </td>
                  </tr>
                  <tr>
                    <td data-label="Job Title">
                      <div class="company-info">
                        <div class="logo">
                          <img
                            src="assets/images/bg/company-logo/company-02-2.png"
                            alt=""
                          />
                        </div>
                        <div class="company-details">
                          <div class="top">
                            <h6>
                              <a href="job-details-2.html"
                                >React JS Developer</a
                              >
                            </h6>
                            <span
                              ><img
                                src="assets/images/icon/calender2-2.svg"
                                alt=""
                              />
                              1 days ago</span
                            >
                          </div>
                          <ul>
                            <li>
                              <img
                                src="assets/images/icon/location-2.svg"
                                alt=""
                              />Dhaka, Bangladesh
                            </li>
                            <li>
                              <img
                                src="assets/images/icon/arrow2-2.svg"
                                alt=""
                              />
                              <p>
                                <span class="title">Salary:</span> $80-$100 /
                                <span class="time">Per Hour</span>
                              </p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </td>
                    <td data-label="Apply Job">07/07/2022</td>
                    <td data-label="Company">
                      <a class="view-btn" href="company-details-2.html"
                        >Gangster Group</a
                      >
                    </td>
                    <td data-label="Status">
                      <button class="eg-btn yellow-btn">Interview</button>
                    </td>
                  </tr>
                  <tr>
                    <td data-label="Job Title">
                      <div class="company-info">
                        <div class="logo">
                          <img
                            src="assets/images/bg/company-logo/company-03-2.png"
                            alt=""
                          />
                        </div>
                        <div class="company-details">
                          <div class="top">
                            <h6>
                              <a href="job-details-2.html"
                                >WordPress Developer</a
                              >
                            </h6>
                            <span
                              ><img
                                src="assets/images/icon/calender2-2.svg"
                                alt=""
                              />
                              2 days ago</span
                            >
                          </div>
                          <ul>
                            <li>
                              <img
                                src="assets/images/icon/location-2.svg"
                                alt=""
                              />West London, UK
                            </li>
                            <li>
                              <img
                                src="assets/images/icon/arrow2-2.svg"
                                alt=""
                              />
                              <p>
                                <span class="title">Salary:</span> $30K-$40K /
                                <span class="time">Monthly</span>
                              </p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </td>
                    <td data-label="Apply Job">10/07/2022</td>
                    <td data-label="Company">
                      <a class="view-btn" href="company-details-2.html"
                        >Zoomly.Co Ltd</a
                      >
                    </td>
                    <td data-label="Status">
                      <button class="eg-btn orenge-btn">Canceled</button>
                    </td>
                  </tr>
                  <tr>
                    <td data-label="Job Title">
                      <div class="company-info">
                        <div class="logo">
                          <img
                            src="assets/images/bg/company-logo/company-04-2.png"
                            alt=""
                          />
                        </div>
                        <div class="company-details">
                          <div class="top">
                            <h6>
                              <a href="job-details-2.html"
                                >Mern-Stack Developer</a
                              >
                            </h6>
                            <span
                              ><img
                                src="assets/images/icon/calender2-2.svg"
                                alt=""
                              />
                              1 week ago</span
                            >
                          </div>
                          <ul>
                            <li>
                              <img
                                src="assets/images/icon/location-2.svg"
                                alt=""
                              />New-York, USA
                            </li>
                            <li>
                              <img
                                src="assets/images/icon/arrow2-2.svg"
                                alt=""
                              />
                              <p>
                                <span class="title">Salary:</span> $20-$50 /
                                <span class="time">Per Hour</span>
                              </p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </td>
                    <td data-label="Apply Job">13/07/2022</td>
                    <td data-label="Company">
                      <a class="view-btn" href="company-details-2.html"
                        >Marko-land Ltd</a
                      >
                    </td>
                    <td data-label="Status">
                      <button class="eg-btn purple-btn">Viewed</button>
                    </td>
                  </tr>
                  <tr>
                    <td data-label="Job Title">
                      <div class="company-info">
                        <div class="logo">
                          <img
                            src="assets/images/bg/company-logo/company-05-2.png"
                            alt=""
                          />
                        </div>
                        <div class="company-details">
                          <div class="top">
                            <h6>
                              <a href="job-details-2.html">PHP Developer</a>
                            </h6>
                            <span
                              ><img
                                src="assets/images/icon/calender2-2.svg"
                                alt=""
                              />
                              2 week ago</span
                            >
                          </div>
                          <ul>
                            <li>
                              <img
                                src="assets/images/icon/location-2.svg"
                                alt=""
                              />New-York, USA
                            </li>
                            <li>
                              <img
                                src="assets/images/icon/arrow2-2.svg"
                                alt=""
                              />
                              <p>
                                <span class="title">Salary:</span> $40K-$60K /
                                <span class="time">Per Month</span>
                              </p>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </td>
                    <td data-label="Apply Job">18/08/2022</td>
                    <td data-label="Company">
                      <a class="view-btn" href="company-details-2.html"
                        >Bistro.Tech Group</a
                      >
                    </td>
                    <td data-label="Status">
                      <button class="eg-btn green-btn">Success</button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="pagination-table-info">
                <div class="table-info">
                  <span>06 Results Showing In 20 Jobs</span>
                </div>
                <div class="pagination-area">
                  <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"></a>
                      </li>
                      <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">01</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">02</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">03</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#"></a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection