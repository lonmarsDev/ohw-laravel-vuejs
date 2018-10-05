<template>
    <div class="innerformmain topspace">
        <h2>Account Security</h2>
        <h2 class="componentheader">2 Factor Authentication</h2>
        <p>Two-factor authentication is a security process where the user provides two forms of ID to log in to Company Name.
            It helps keep your account safe, which is why we give you a 10% discount for using it. There are two ways to use two-factor
            authentication with Company Name: use an authenticator app, or enable SMS account verification.</p>
        <br />
        <h4 class="componentheader">Use an authenticator app for two factor authentication</h4>
        <p>Company Name integrated with <a href="#" class="componentarchor">Authy</a> and other mobile apps for two-factor authentication.</p>
        <button type="button" class="btn btn1">Enable</button>
    </div>
</template>

<script>
    export default {
        name: 'AccountSecurity'
    }
</script>

<style scoped>
    .componentheader {
        color: #2b3443;
        padding-bottom: 5px;
    }

    .componentarchor {
        color: #16b3b9;
        border-bottom: #16b3b9 2px dotted;
        font-weight: 502;
    }
</style>