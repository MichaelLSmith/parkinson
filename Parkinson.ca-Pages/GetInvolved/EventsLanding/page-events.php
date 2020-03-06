<?php

/*
Template Name: Events Landing
Template to display all profile CPTs
*/

get_header(); ?>

  <div class="x-container max width offset">
    <div class="x-main left" role="main">
      <p>Above Loop</p>
      <p>Parkinson Canada Events</p>

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="container-fluid events-landing">
            <div class="row events-landing-row">
              <div class="col-sm-6 col-md-4">
                <div class="event-photo-size">Image Here</div>
                <h4>Parkinson Canada SuperWalk</h4>
                <p>Canada’s only nationwide fundraising event in support of Canadians living with Parkinson’s takes place from coast-to-coast-to-coast the weekend after Labour Day each year. Join those impacted by Parkinson’s in your community and make a difference.
                </p>
                <a href="#">See more about Parkinson Canada SuperWalk</a>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="event-photo-size">Image Here</div>
                <h4>Fundraising your way</h4>
                <p>Fundraising Your Way is an event program developed in recognition of the many ways people who are passionate about a world without Parkinson’s are choosing to make their mark in support of Parkinson Canada. Fundraising Your Way is a do-it-yourself toolbox to help support you in making an impact in the exact way you want to.</p>
                <a href="#">See more about Fundraising your way</a>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="event-photo-size">Image Here</div>
                <h4>Porridge for Parkinson's</h4>
                <p>Porridge for Parkinson’s is an elegant morning that features a breakfast prepared and served by Toronto’s celebrity chefs, a breakfast-themed silent auction and special guests from media and medicine. Hosted biennially, the next event takes place November 12, 2017.</p>
                <a href="#">See more about Porridge for Parkinson’s (Toronto)</a>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="event-photo-size">Image Here</div>
                <h4>Pedaling for Parkinson's</h4>
                <p>Pedaling for Parkinson’s is a three-day cycling event hosted in Parry Sound, Ontario. A ride for all skill levels, this community event puts Parkinson’s at the forefront and encourages people to participate in distances ranging from 40-130km on one, two or all three days.</p>
                <a href="#">See more about Pedaling for Parkinson’s</a>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="event-photo-size">Image Here</div>
                <h4>Community Events near you</h4>
              </div>
              <div class="col-sm-6 col-md-4">
                <h4>Search for Participants</h4>
                <form name="TeamRaiserQuickSearch" action="http://psc.convio.net/site/TR" method="post">
                  <input name="fr_id" type="hidden" value="2051">
                  <input name="pg" type="hidden" value="pfind">
                  <input  name="qf" type="text">
                  <input class="x-btn x-btn-global" type="submit" value="search">
                </form>
              </div>
            </div>
          </div>
          <br>
          <br>


          Possible search feature Or Upcoming events (below)

          <h4>Events this month or Upcoming Events</h4>

          List of events based on Event date rather than geographic location. This would be dependent on having good information entered into the events. Right now we're not capturing the date except for a loose text field. We would need to have all events use a date field that could be used to filter events.






        </article>

      <?php endwhile; ?>

    </div>
      <?php get_sidebar(); ?>
  </div>

<?php get_footer(); ?>
