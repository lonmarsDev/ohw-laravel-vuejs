<template>
    <div class="innerformmain topspace">
        <h2 class="componentheader">Data Science Privacy Setting</h2>
        <p>Some Company Name features, like Discover Similar Subscribers, analyze information from user accounts to provide data-driven
            predictions and recommendations. Your participation can improve these results and help all customers achieve their
            email marketing goals. </p>
        <p>We make every effort to protect your data in these features, using privacy safeguards where possible and always complying
            with our <a href="" class="componentarchor">Privacy Policy.</a></p>
        <div class="formall">
            <form action="">
                <ul class="checkbox2">
                    <li>
                        <input type="checkbox" class="checkbox2-checkbox">
                        <label> Don’t include my data in Company Name’s data  science projects</label>
                    </li>

                </ul>
                <button type="submit" class="btn btn1">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
  export default {
    name: "DataSciencePrivacy"
  }
</script>

<style scoped>
    .componentheader {
        color: #2b3443;
        padding-bottom: 5px;
    }

    .paddingTop {
        padding-top: 10px;
    }

    .componentarchor {
        color: #16b3b9;
        border-bottom: #16b3b9 2px dotted;
        font-weight: 502;
    }

</style>