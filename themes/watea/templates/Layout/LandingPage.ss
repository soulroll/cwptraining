<div class="container">
    <div class="row">
        <section class="col-md-10 col-md-offset-1">
            <div class="page-header">
                $Breadcrumbs
                <h1>$Title</h1>
                You what mate are you avin a giggle m8?
            </div>
        </section>
    </div>
    <div class="row">
        <section class="col-md-7 col-md-offset-1">

            <% if SpecialContentHeadline && SpecialContent %>
              <h3>$SpecialContentHeadline</h3>
              <div>$SpecialContent</div>
              <hr />
              <p class="text-center">$CurrentDateTime</p>
            <% end_if %>

            <% loop $Children %>
                <div>
                    <h3>$Title</h3>
                    $Intro
                    <p>$Content.LimitCharacters(50)
                        <a href="$Link">Read more...</a>
                    </p>
                    <hr />
                </div>
            <% end_loop %>

            <% if $Content.RichLinks %>
                $Content.RichLinks
            <% end_if %>



        </section>


        <section class="col-md-10 col-md-offset-1">
            <h3>Booking Enquiry</h3>
            $EnquiryForm
        </section>







    </div>
</div>
<% include PageUtilities %>
