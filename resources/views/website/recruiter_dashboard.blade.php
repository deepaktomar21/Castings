@extends('website.layouts.app')

@section('title', 'Post Job')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="hs-web-interactives-top-push-anchor" class="go3670563033"></div><div id="hs-feedback-fetcher" title="submit hubspot feedback"><iframe frameborder="0" title="Submit HubSpot product feedback" src="https://app.hubspot.com/feedback-web-fetcher"></iframe></div>
    <a href="https://wni0s6klnf.execute-api.us-east-1.amazonaws.com/ProdStage" rel="nofollow" style="display: none" aria-hidden="true">Customers</a>

    
    

    
<div id="header__container"><header id="backstage-header"><div class="nav-group logged-in"><nav id="main-navbar" class="main-navbar nav-bar navbar navbar-expand-lg light-nav"><div class="main-navbar__container"><div class="navbar-header"><div><a class="backstage-logo" href="/casting_director/" aria-label="Go to Backstage home"><img alt="logo" class="logo" src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxODQ4IDM1Ni41NCI+PHRpdGxlPkJhY2tzdGFnZV9Xb3JkbWFya19CbGFja19SR0I8L3RpdGxlPjxwYXRoIGQ9Ik02OS4yOCwyMDYuNDV2OTUuNDhIOTAuMTdjMzIuNjcsMCw0MS43OC0xNy4xLDQxLjc4LTQ3LjQ3LDAtMjkuNzktOS4xMS00OC00MS43OC00OFptMC01Mi40M0g4OGMzMi4xMywwLDM5LjY0LTE3LjY3LDM5LjY0LTQ0LjE2UzEyMC4xNiw2NC4wNSw4OCw2NC4wNUg2OS4yOFpNOTYuNiwzNTcuMTNINVY5LjQxSDk1YzcwLjE3LDAsOTQuMjcsMzcuNTQsOTQuMjcsOTIuMTcsMCw0Mi41LTIzLDcwLjY1LTU2LjI0LDc2LjcyLDQwLjE4LDcuNzMsNjIuNjgsMzYuNDMsNjIuNjgsODIuNzksMCw2MC43MS0yOS40Nyw5Ni05OS4xLDk2IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNSAtNSkiLz48cGF0aCBkPSJNMjkxLDIyOS42M2g0OC4yMUwzMTYuNzQsMTA0LjloLTIuMTVaTTM1Ni45MSw5LjQxbDcxLjc4LDM0Ny43MkgzNjIuMjdsLTEzLjkzLTc1LjA3aC02N2wtMTMuOTIsNzUuMDdIMjA2LjRMMjc4LjE3LDkuNDFaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNSAtNSkiLz48cGF0aCBkPSJNNTA2LjE0LDI0MC4xMmMwLDQwLjI5LDUuMzUsNjUuNjgsMzAuNTMsNjUuNjgsMjUuNzEsMCwzMC0yNS4zOSwzMC02NS42OFYyMDguNjZoNjQuODJWMjIzYzAsODMuMzQtMjMsMTM4LjUzLTkzLjIxLDEzOC41My03Mi44NSwwLTEwMC43LTU0LjY0LTEwMC43LTE1My40NFYxNTguNDNDNDM3LjU4LDU5LjY0LDQ2NS40Myw1LDUzOC4yOCw1YzcwLjE3LDAsOTMuMjEsNTUuMTksOTMuMjEsMTM4LjUzdjE0LjM1SDU2Ni42N1YxMjYuNDJjMC00MC4yOS00LjI5LTY1LjY4LTMwLTY1LjY4LTI1LjE4LDAtMzAuNTMsMjUuMzktMzAuNTMsNjUuNjhaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNSAtNSkiLz48cG9seWdvbiBwb2ludHM9Ijc4OC4wOCAzNTIuMTMgNzQ1Ljc2IDIxOC41NyA3MjUuOTUgMjY5Ljg5IDcyNS45NSAzNTIuMTMgNjU5LjUzIDM1Mi4xMyA2NTkuNTMgNC40MiA3MjUuOTUgNC40MiA3MjUuOTUgMTY5Ljk5IDc4OC4wOCA0LjQyIDg1Ni42NSA0LjQyIDc5NS41OCAxNTYuMTkgODU3LjcyIDM1Mi4xMyA3ODguMDggMzUyLjEzIi8+PHBhdGggZD0iTTkyNywyMzcuMzZ2MjFjMCwyOS44LDExLjc4LDQ4LjU3LDM0LjI4LDQ4LjU3LDIwLjM1LDAsMzAuNTMtMTMuOCwzMC41My0zNywwLTI0LjgzLTEyLjg1LTMzLjY2LTMzLjIxLTQ3LjQ2bC0yNy44NS0xOC4yMmMtMzIuNjgtMjEtNjEuNi00NC43LTYxLjYtMTAyLjY2UzkwNCw1LDk1OC4wNSw1YzU4LjM5LDAsODkuNDUsMzYuNDIsODkuNDUsMTAzLjIxdjE5Ljg3SDk4OS4xMVYxMDcuNjZjMC0zMS40Ni05LjY0LTQ4LTMxLjA2LTQ4LTE4Ljc1LDAtMjcuODYsMTQuOS0yNy44NiwzNy41MywwLDIzLjE4LDEwLjE4LDM0Ljc3LDI3LjMyLDQ1LjgxTDk4OCwxNjIuODVjMzkuMSwyMy43Myw2NS4zNSw0OCw2NS4zNSwxMDEuNTUsMCw2Mi4zNy0zNi40Miw5Ny4xNC05Mi4xMyw5Ny4xNC01Ni43OCwwLTkzLjItMzQuNzctOTMuMi0xMDQuMzFWMjM3LjM2WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTUgLTUpIi8+PHBvbHlnb24gcG9pbnRzPSIxMTE4Ljk0IDM1Mi4xMyAxMTE4Ljk0IDYwLjcxIDEwNTUuNzMgNjAuNzEgMTA1NS43MyA0LjQyIDEyNTAuMTcgNC40MiAxMjUwLjE3IDYwLjcxIDExODUuMzYgNjAuNzEgMTE4NS4zNiAzNTIuMTMgMTExOC45NCAzNTIuMTMiLz48cGF0aCBkPSJNMTMxOC45MSwyMjkuNjNoNDguMmwtMjIuNS0xMjQuNzNoLTIuMTRaTTEzODQuNzksOS40MWw3MS43OCwzNDcuNzJoLTY2LjQzbC0xMy45Mi03NS4wN2gtNjdsLTEzLjkzLDc1LjA3aC02MS4wNkwxMzA2LjA1LDkuNDFaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNSAtNSkiLz48cGF0aCBkPSJNMTYxNC42NSwzNTcuMTMsMTYwOS4yOSwzMjRjLTcuNSwyNS4zOS0zMS4wNywzNy41My01Ni43OCwzNy41My02My4yMSwwLTg5LjQ1LTU0LjY0LTg5LjQ1LTE1My40NFYxNTguNDNDMTQ2My4wNiw1OS42NCwxNDkyLDUsMTU2My4yMiw1YzcwLjcxLDAsOTUuMzUsNDkuNjcsOTUuMzUsMTMzdjcuNzNoLTY0LjgxVjEyNi40MmMwLTQwLjI5LTQuODMtNjUuNjgtMzAuNTQtNjUuNjhzLTMxLjYsMjUuMzktMzEuNiw2NS42OHYxMTJjMCw0MC44NSw3LjUsNjYuMjMsMzIuNjcsNjYuMjNzMzIuMTUtMjUuMzgsMzIuMTUtNjYuMjN2LTYuNjJoLTI3Ljg2VjE4MGg5MC41MlYzNTcuMTNaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNSAtNSkiLz48cG9seWdvbiBwb2ludHM9IjE2ODkuOTkgNC40MiAxNjg5Ljk5IDM1Mi4xMyAxODQ4IDM1Mi4xMyAxODQ4IDI5NS44MyAxNzU0LjggMjk1LjgzIDE3NTQuOCAyMDIuNTUgMTgyMy45IDIwMi41NSAxODIzLjkgMTQ2LjI2IDE3NTQuOCAxNDYuMjYgMTc1NC44IDYwLjcxIDE4NDYuOTMgNjAuNzEgMTg0Ni45MyA0LjQyIDE2ODkuOTkgNC40MiIvPjwvc3ZnPg=="></a></div><div class="d-flex align-items-center"><a href="/casting/" class="find-jobs-btn ga-cc-link-mobile find-jobs-btn--no-submenu" aria-label="Search auditions and find jobs"><span class="text">Find Jobs</span></a><button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><span class="icon"></span></span></button></div></div><div class="collapse navbar-collapse" id="navbarSupportedContent"><div class="navbar-nav__container"><ul class="nav navbar-nav main-navbar--left"><li class="main-navbar__link dropdown productions"><a class="dropdown-toggle" id="dropdownProductions" href="#" role="button" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Productions">Productions<span class="backstage-header-dd-arrow"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg></span><span class="mandy-header-dd-arrow"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="svg-inline--fa fa-caret-down " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"></path></svg></span></a><div class="dropdown-menu " role="menu" aria-labelledby="dropdownProductions"><div class="dropdown-menu__container"><div class="dropdown-menu__row"><ul class="dropdown-menu__col "><li class="production-title"><a href="/casting_director/">My Productions</a></li><li>Loading...</li></ul></div></div></div></li><li class="main-navbar__link dropdown "><a class="dropdown-toggle" id="dashboardDropdown" href="#" role="button" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="">Dashboard<span class="backstage-header-dd-arrow"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg></span><span class="mandy-header-dd-arrow"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="svg-inline--fa fa-caret-down " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"></path></svg></span></a><div class="dropdown-menu " role="menu" aria-labelledby="dashboardDropdown"><div class="dropdown-menu__container"><div class="dropdown-menu__row"><ul class="dropdown-menu__col "><li><a href="/casting_director/" aria-label="Casting Dashboard" class=" dropdown-item font-md-mobile"><span class="icon-container"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="gauge" class="svg-inline--fa fa-gauge icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M192 352C192 322.2 212.4 297.1 239.1 290L239.1 95.1C239.1 87.16 247.2 79.1 255.1 79.1C264.8 79.1 272 87.16 272 95.1L272 290C299.6 297.1 320 322.2 320 352C320 387.3 291.3 416 256 416C220.7 416 192 387.3 192 352V352zM256 384C273.7 384 288 369.7 288 352C288 334.3 273.7 320 256 320C238.3 320 224 334.3 224 352C224 369.7 238.3 384 256 384zM120 144C120 130.7 130.7 120 144 120C157.3 120 168 130.7 168 144C168 157.3 157.3 168 144 168C130.7 168 120 157.3 120 144zM120 256C120 269.3 109.3 280 96 280C82.75 280 72 269.3 72 256C72 242.7 82.75 232 96 232C109.3 232 120 242.7 120 256zM392 256C392 242.7 402.7 232 416 232C429.3 232 440 242.7 440 256C440 269.3 429.3 280 416 280C402.7 280 392 269.3 392 256zM392 144C392 157.3 381.3 168 368 168C354.7 168 344 157.3 344 144C344 130.7 354.7 120 368 120C381.3 120 392 130.7 392 144zM0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 480C379.7 480 480 379.7 480 256C480 132.3 379.7 32 256 32C132.3 32 32 132.3 32 256C32 379.7 132.3 480 256 480z"></path></svg></span><div class="dropdown-item-menu"><span class="menu-text">Casting Dashboard </span></div></a></li></ul></div></div></div></li><li class="main-navbar__link"><a href="/talent/" class=" d-flex align-items-center" aria-label="Find Talent">Find Talent</a></li><li class="main-navbar__link"><a href="/messaging/" class="dropdown-toggle d-flex align-items-center" aria-label="Messages">Messages</a></li></ul><ul class="nav navbar-nav main-navbar--right"><li><div><a target="_self" role="button" aria-label="Post a Job" class="d-inline-flex justify-content-center align-items-center btn-primary-xs mr-3 text-nowrap" href="/post_a_job/">Post a Job</a></div></li><li class="main-navbar__link dropdown "><a class="dropdown-toggle" id="moreDropdown" href="#" role="button" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="">More<span class="backstage-header-dd-arrow"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path></svg></span><span class="mandy-header-dd-arrow"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="svg-inline--fa fa-caret-down " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"></path></svg></span></a><div class="dropdown-menu " role="menu" aria-labelledby="moreDropdown"><div class="dropdown-menu__container"><div class="dropdown-menu__row"><ul class="dropdown-menu__col "><li><a href="/accounts/manage/" aria-label="" class=" dropdown-item font-md-mobile"><span class="icon-container"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="gear" class="svg-inline--fa fa-gear icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M168 255.1C168 207.4 207.4 167.1 256 167.1C304.6 167.1 344 207.4 344 255.1C344 304.6 304.6 344 256 344C207.4 344 168 304.6 168 255.1zM256 199.1C225.1 199.1 200 225.1 200 255.1C200 286.9 225.1 311.1 256 311.1C286.9 311.1 312 286.9 312 255.1C312 225.1 286.9 199.1 256 199.1zM65.67 230.6L25.34 193.8C14.22 183.7 11.66 167.2 19.18 154.2L49.42 101.8C56.94 88.78 72.51 82.75 86.84 87.32L138.8 103.9C152.2 93.56 167 84.96 182.8 78.43L194.5 25.16C197.7 10.47 210.7 0 225.8 0H286.2C301.3 0 314.3 10.47 317.5 25.16L329.2 78.43C344.1 84.96 359.8 93.56 373.2 103.9L425.2 87.32C439.5 82.75 455.1 88.78 462.6 101.8L492.8 154.2C500.3 167.2 497.8 183.7 486.7 193.8L446.3 230.6C447.4 238.9 448 247.4 448 255.1C448 264.6 447.4 273.1 446.3 281.4L486.7 318.2C497.8 328.3 500.3 344.8 492.8 357.8L462.6 410.2C455.1 423.2 439.5 429.2 425.2 424.7L373.2 408.1C359.8 418.4 344.1 427 329.2 433.6L317.5 486.8C314.3 501.5 301.3 512 286.2 512H225.8C210.7 512 197.7 501.5 194.5 486.8L182.8 433.6C167 427 152.2 418.4 138.8 408.1L86.84 424.7C72.51 429.2 56.94 423.2 49.42 410.2L19.18 357.8C11.66 344.8 14.22 328.3 25.34 318.2L65.67 281.4C64.57 273.1 64 264.6 64 255.1C64 247.4 64.57 238.9 65.67 230.6V230.6zM158.4 129.2L145.1 139.5L77.13 117.8L46.89 170.2L99.58 218.2L97.39 234.8C96.47 241.7 96 248.8 96 255.1C96 263.2 96.47 270.3 97.39 277.2L99.58 293.8L46.89 341.8L77.13 394.2L145.1 372.5L158.4 382.8C169.5 391.4 181.9 398.6 195 403.1L210.5 410.4L225.8 480H286.2L301.5 410.4L316.1 403.1C330.1 398.6 342.5 391.4 353.6 382.8L366.9 372.5L434.9 394.2L465.1 341.8L412.4 293.8L414.6 277.2C415.5 270.3 416 263.2 416 256C416 248.8 415.5 241.7 414.6 234.8L412.4 218.2L465.1 170.2L434.9 117.8L366.9 139.5L353.6 129.2C342.5 120.6 330.1 113.4 316.1 108L301.5 101.6L286.2 32H225.8L210.5 101.6L195 108C181.9 113.4 169.5 120.6 158.4 129.2H158.4z"></path></svg></span><div class="dropdown-item-menu"><span class="menu-text">Account Settings </span></div></a></li><li><a href="/casting/" aria-label="" class=" dropdown-item font-md-mobile"><span class="icon-container"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="magnifying-glass" class="svg-inline--fa fa-magnifying-glass icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504.1 471l-134-134C399.1 301.5 415.1 256.8 415.1 208c0-114.9-93.13-208-208-208S-.0002 93.13-.0002 208S93.12 416 207.1 416c48.79 0 93.55-16.91 129-45.04l134 134C475.7 509.7 481.9 512 488 512s12.28-2.344 16.97-7.031C514.3 495.6 514.3 480.4 504.1 471zM48 208c0-88.22 71.78-160 160-160s160 71.78 160 160s-71.78 160-160 160S48 296.2 48 208z"></path></svg></span><div class="dropdown-item-menu"><span class="menu-text">Find Jobs </span></div></a></li><li><a href="/magazine/" aria-label="" class=" dropdown-item font-md-mobile"><span class="icon-container"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="newspaper" class="svg-inline--fa fa-newspaper icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 32h-320C117.5 32 96 53.53 96 80V416c0 17.66-14.36 32-32 32s-32-14.34-32-32V112C32 103.2 24.84 96 16 96S0 103.2 0 112V416c0 35.28 28.7 64 64 64h368c44.11 0 80-35.88 80-80v-320C512 53.53 490.5 32 464 32zM480 400c0 26.47-21.53 48-48 48H119.4C124.9 438.6 128 427.7 128 416V80C128 71.19 135.2 64 144 64h320C472.8 64 480 71.19 480 80V400zM272 304h-96C167.2 304 160 311.2 160 320s7.156 16 16 16h96c8.844 0 16-7.156 16-16S280.8 304 272 304zM432 304h-96C327.2 304 320 311.2 320 320s7.156 16 16 16h96c8.844 0 16-7.156 16-16S440.8 304 432 304zM272 368h-96C167.2 368 160 375.2 160 384s7.156 16 16 16h96c8.844 0 16-7.156 16-16S280.8 368 272 368zM432 368h-96c-8.844 0-16 7.156-16 16s7.156 16 16 16h96c8.844 0 16-7.156 16-16S440.8 368 432 368zM416 96H192C174.3 96 160 110.3 160 128v96c0 17.67 14.33 32 32 32h224c17.67 0 32-14.33 32-32V128C448 110.3 433.7 96 416 96zM416 224H192V128h224V224z"></path></svg></span><div class="dropdown-item-menu"><span class="menu-text">Magazine </span></div></a></li><li><a href="/medialocker/" aria-label="" class=" dropdown-item font-md-mobile"><span class="icon-container"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="photo-film" class="svg-inline--fa fa-photo-film icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M288 120C301.3 120 312 109.3 312 96s-10.74-24-24-24C274.7 72 264 82.75 264 96S274.7 120 288 120zM576 0H256C220.7 0 192 28.65 192 64v224c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V64C640 28.65 611.3 0 576 0zM608 288c0 17.64-14.36 32-32 32H256c-17.64 0-32-14.36-32-32V64c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V288zM474.6 107.9c-11.28-15.81-38.5-15.94-49.1-.0313l-44.03 61.43l-6.969-8.941c-11.44-14.46-36.97-14.56-48.4 .0313L262.2 240.8C255 249.9 254 262.3 259.5 272.3C264.8 281.1 275.1 288 286.4 288h259.2c11 0 21.17-5.805 26.54-15.09c0-.0313-.0313 .0313 0 0c5.656-9.883 5.078-21.84-1.578-31.15L474.6 107.9zM290.2 255.9l58.25-75.61l20.09 25.66c4.348 5.545 17.6 10.65 25.59-.5332l54.44-78.75l92.68 129.2H290.2zM496 384c-8.836 0-16 7.162-16 16V448c0 17.67-14.33 32-32 32h-32v-80c0-8.838-7.164-16-16-16S384 391.2 384 400V480H128V192h16C152.8 192 160 184.8 160 176C160 167.2 152.8 160 144 160H64C28.65 160 0 188.7 0 224v224c0 35.35 28.65 64 64 64h384c35.35 0 64-28.65 64-64v-48C512 391.2 504.8 384 496 384zM96 480H64c-17.64 0-32-14.36-32-32v-32h64V480zM96 384H32V288h64V384zM96 256H32V224c0-17.64 14.36-32 32-32h32V256z"></path></svg></span><div class="dropdown-item-menu"><span class="menu-text">Media Locker </span></div></a></li><li><a href="https://headwayapp.co/backstage-updates?utm_medium=widget" class="dropdown-item feature-alert font-md-mobile"><span class="icon-container"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sparkles" class="svg-inline--fa fa-sparkles icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M432 32C440.8 32 448 39.16 448 48V96H496C504.8 96 512 103.2 512 112C512 120.8 504.8 128 496 128H448V176C448 184.8 440.8 192 432 192C423.2 192 416 184.8 416 176V128H368C359.2 128 352 120.8 352 112C352 103.2 359.2 96 368 96H416V48C416 39.16 423.2 32 432 32zM432 320C440.8 320 448 327.2 448 336V384H496C504.8 384 512 391.2 512 400C512 408.8 504.8 416 496 416H448V464C448 472.8 440.8 480 432 480C423.2 480 416 472.8 416 464V416H368C359.2 416 352 408.8 352 400C352 391.2 359.2 384 368 384H416V336C416 327.2 423.2 320 432 320zM123.3 321.8L9.292 269.1C3.627 266.5 0 260.8 0 254.6C0 248.3 3.627 242.6 9.292 240L123.3 187.3L176 73.29C178.6 67.63 184.3 64 190.6 64C196.8 64 202.5 67.63 205.1 73.29L257.8 187.3L371.8 240C377.5 242.6 381.1 248.3 381.1 254.6C381.1 260.8 377.5 266.5 371.8 269.1L257.8 321.8L205.1 435.8C202.5 441.5 196.8 445.1 190.6 445.1C184.3 445.1 178.6 441.5 176 435.8L123.3 321.8zM54.16 254.6L136.8 292.7C143.7 295.9 149.2 301.4 152.4 308.3L190.6 390.9L228.7 308.3C231.9 301.4 237.4 295.9 244.3 292.7L326.9 254.6L244.3 216.4C237.4 213.2 231.9 207.7 228.7 200.8L190.6 118.2L152.4 200.8C149.2 207.7 143.7 213.2 136.8 216.4L54.16 254.6z"></path></svg></span><div class="dropdown-item-menu"><span class="menu-text">What's New</span></div><span id="HW_badge_cont" class="HW_badge_cont HW_visible" style=""><span id="HW_badge" class="HW_badge HW_visible HW_animated" data-count-unseen="3" style="">3</span></span></a></li><li><a href="/accounts/logout/" aria-label="" class=" dropdown-item font-md-mobile"><span class="icon-container"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="right-from-bracket" class="svg-inline--fa fa-right-from-bracket icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M176 448h-96C53.53 448 32 426.5 32 400v-288C32 85.53 53.53 64 80 64h96C184.8 64 192 56.84 192 48S184.8 32 176 32h-96C35.88 32 0 67.88 0 112v288C0 444.1 35.88 480 80 480h96C184.8 480 192 472.8 192 464S184.8 448 176 448zM502.6 233.4l-128-128c-9.156-9.156-22.91-11.91-34.88-6.938C327.8 103.4 320 115.1 320 128l.0918 63.1L176 192C149.5 192 128 213.5 128 240v32C128 298.5 149.5 320 176 320l144.1-.001L320 384c0 12.94 7.797 24.62 19.75 29.56c11.97 4.969 25.72 2.219 34.88-6.938l128-128C508.9 272.4 512 264.2 512 256S508.9 239.6 502.6 233.4zM352 384V288H176C167.2 288 160 280.8 160 272v-32C160 231.2 167.2 224 176 224H352l-.0039-96l128 128L352 384z"></path></svg></span><div class="dropdown-item-menu"><span class="menu-text">Log Out </span></div></a></li><li><div class="blue-box font-sm w-100"><span>Create a talent profile and start applying for jobs!</span><button type="button" aria-label="Create Profile" class="d-inline-flex justify-content-center align-items-center btn-primary-md mt-2 ml-0 text-nowrap">Create Profile</button></div></li></ul></div></div></div></li></ul></div></div></div></nav></div></header></div>


    
<div class="loading" style="display: none;">
    <div class="loader-container">
        <div class="loader"></div>
    </div>
</div>
<div class="container-fluid main__container logged-in" id="main__container"><div id="castings-dashboard-app"><div class="modal-container modal fade" id="GoToAppManagerErrorModal" role="dialog" aria-labelledby="GoToAppManagerErrorModal" aria-hidden="true" tabindex="-1"><div class="modal-dialog"><form data-hs-cf-bound="true"><div id="modal-content-GoToAppManagerErrorModal" class="modal-content"><div class="modal-header"><div><h3 class="modal-title">Application Manager Unavailable</h3></div></div><div class="modal-description"><p>Your job is currently being reviewed. The Application Manager will become available once it is approved.</p></div><div class="modal-footer"><div class="modal-footer__btns justify-content-center"><button type="submit" class="modal__btn--action btn-primary-md join">OK</button></div></div></div></form></div></div><div class="modal-container modal fade" id="delete-draft" role="dialog" aria-labelledby="delete-draft" aria-hidden="true" tabindex="-1"><div class="modal-dialog"><form data-hs-cf-bound="true"><div id="modal-content-delete-draft" class="modal-content"><div class="modal-header"><div><h3 class="modal-title">Delete draft?</h3></div><button type="button" tabindex="-1" class="modal__btn--close"><span class="sr-only">close</span></button></div><div class="modal-body"><p>Are you sure you want to delete <strong></strong>?</p></div><div class="modal-footer"><div class="modal-footer__btns"><button type="submit" class="modal__btn--action btn-primary-md join disabled" disabled="">OK</button><button type="button" class="modal__btn--action btn-gray-md later">Cancel</button></div></div></div></form></div></div><div class="dashboard--top"><div class="inner"><div class="row"><div class="col-12"><div class="tip-banner"><div class="alert-box--feature font-md-mobile with-cta mb-30px" role="alert"><span class="with-cta__text">Need gear for your production? Join ShareGrid, a community of verified filmmakers and photographers renting out their equipment. Rent gear for 30-50% less, no deposits and instant coverage.</span><span class="with-cta__button"><a target="_blank" rel="noreferrer noopener nofollow" role="button" class="d-inline-flex justify-content-center align-items-center btn-primary-xs text-nowrap" href="https://www.sharegrid.com/welcome?utm_source=backstage&amp;utm_medium=onsite&amp;utm_campaign=casting-dashboard">Join ShareGrid</a></span></div></div></div></div></div><div class="inner"><div class="row row--title"><div class="col-sm-6 col-xs-7 col-xxxs-12"><div class="page-title page-title--app font-md-mobile"><h2>Casting Dashboard</h2></div></div><div class="col-sm-6 col-xs-5 col-xxxs-12 title__row--btns"><a target="_self" role="button" class="d-inline-flex justify-content-center align-items-center btn-base btn-ghost btn-ghost-secondary-md text-nowrap" href="/post_a_job/"><span class="mr-2"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="font-weight: 900;"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></span>Create New Production</a></div></div></div></div><div class="dashboard--main"><div class="inner"><div class="row main__row" id="dashboard-content"><div class="col-lg-16 col-md-16 col-sm-12 main__row--col"><div class="dashboard--main__panel audition"><div class="row"><div class="col-12 panel__header"><div class="panel__header--title">Upcoming Auditions<span class="count">&nbsp;(0)</span></div></div><div class="col-12 panel__content section-content"><div class="panel__content--empty">You have no upcoming auditions on your calendar.</div></div></div></div></div><div class="col-lg-8 col-md-8 col-sm-12 main__row--col left-panel"><div id="productions"><div class="dashboard--main__panel"><div class="row"><div class="col-12 panel__header"><div class="panel__header--title">My Productions<span class="count"> (1)</span></div><div class="panel__header--tabs"><ul class="nav nav-tabs filters" role="tablist"><li><a aria-current="page" class="active" href="/casting_director/manage/all/" data-discover="true">All</a></li><li><a href="/casting_director/manage/active/" data-discover="true">Active</a></li><li><a href="/casting_director/manage/draft/" data-discover="true">Drafts</a></li><li><a href="/casting_director/manage/expired/" data-discover="true">Expired</a></li></ul></div></div><div id="productions-section-contents" class="col-12 tab-content panel__content collapse show"><div class="tab-pane active fade show" id="tab-prod-all"><div class="panel-group active section-content" id="production-list"><div class="panel panel-default production-item status-Draft prod__draft"><div class="row panel__content--production"><div class="col-lg-6 col-md-12 col-sm-12"><div class="prod__info--title"><a>Untitled Project - created on 04/01/2025</a></div><div class="prod__info--apps"><span class="info__apps--new">0 new</span>, 0 cast, 0 audition, 0 total</div></div><div class="col-lg-6 col-md-12 col-sm-12"><div class="prod__links"><div><a href="https://www.backstage.com/post_a_job/details/2940858" rel="noopener noreferrer" target="_blank" class="edit-prod-btn icon"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="pen" class="svg-inline--fa fa-pen " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M58.57 323.5L362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C495.8 61.87 498.5 65.24 500.9 68.79C517.3 93.63 514.6 127.4 492.7 149.3L188.5 453.4C187.2 454.7 185.9 455.1 184.5 457.2C174.9 465.7 163.5 471.1 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L58.57 323.5zM82.42 374.4L59.44 452.6L137.6 429.6C143.1 427.7 149.8 424.2 154.6 419.5L383 191L320.1 128.1L92.51 357.4C91.92 358 91.35 358.6 90.8 359.3C86.94 363.6 84.07 368.8 82.42 374.4L82.42 374.4z"></path></svg></a><a role="button" class="delete-prod-btn icon" aria-label="Delete Draft"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-can" class="svg-inline--fa fa-trash-can " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M160 400C160 408.8 152.8 416 144 416C135.2 416 128 408.8 128 400V192C128 183.2 135.2 176 144 176C152.8 176 160 183.2 160 192V400zM240 400C240 408.8 232.8 416 224 416C215.2 416 208 408.8 208 400V192C208 183.2 215.2 176 224 176C232.8 176 240 183.2 240 192V400zM320 400C320 408.8 312.8 416 304 416C295.2 416 288 408.8 288 400V192C288 183.2 295.2 176 304 176C312.8 176 320 183.2 320 192V400zM317.5 24.94L354.2 80H424C437.3 80 448 90.75 448 104C448 117.3 437.3 128 424 128H416V432C416 476.2 380.2 512 336 512H112C67.82 512 32 476.2 32 432V128H24C10.75 128 0 117.3 0 104C0 90.75 10.75 80 24 80H93.82L130.5 24.94C140.9 9.357 158.4 0 177.1 0H270.9C289.6 0 307.1 9.358 317.5 24.94H317.5zM151.5 80H296.5L277.5 51.56C276 49.34 273.5 48 270.9 48H177.1C174.5 48 171.1 49.34 170.5 51.56L151.5 80zM80 432C80 449.7 94.33 464 112 464H336C353.7 464 368 449.7 368 432V128H80V432z"></path></svg></a></div><a class="dash__chevron collapsed"><i class="indicator icon-chevron-down pull-right"></i></a></div></div><div class="col-12"></div></div><div class="vertical-slidey max-h-0" style="max-height: 0px; overflow: hidden;"><div><div id="prod-2940858" class="panel-collapse prod__details"><div class="panel-body"><div class="prod__status"><span class="text-nowrap">Status: <span class="prod__status--info">Draft</span></span> <span class="text-nowrap">Created on: <span class="prod__status--info">04/01/2025</span></span> <span class="text-nowrap">Expires on: <span class="prod__status--info">05/02/2025</span></span> <span class="text-nowrap">Email Notification: <span class="prod__status--info"></span></span></div></div></div></div></div></div></div></div></div></div></div></div><div class="collaborators-section" id="collaborators"><div class="dashboard--main__panel"><div class="row"><div class="col-12 panel__header"><a href="/casting_director/collaborators" class="panel__header--title manage-collab-btn">Collaborators<span class="count"> (0)</span></a><div class="panel__header--tabs"><ul class="nav nav-tabs filters" role="tablist"><li><a class="" role="tab">Recently Invited</a></li><li><a class="active" role="tab">Active Productions</a></li><li><a class="" role="tab">All</a></li></ul></div></div><div id="collaborators-section-contents" class="col-12 tab-content panel__content"><div class="tab-pane active fade show" id="tab-prod-all"><div class="panel__content--empty">You don't have any collaborators on your active productions.</div></div></div></div></div></div></div><div class="col-lg-4 col-md-4 col-sm-12 main__row--col right-panel"><div id="shortlists"><div class="dashboard--main__panel"><div class="row"><div class="col-12 panel__header"><div class="panel__header--title">My Shortlists<span class="count"> (0)</span><button aria-label="" type="button" class="info-link" data-toggle="tooltip" data-placement="right" title="" data-original-title="View the shortlists you've created, as well as the ones that have been shared with you."><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="circle-info" class="svg-inline--fa fa-circle-info " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM296 336h-16V248C280 234.8 269.3 224 256 224H224C210.8 224 200 234.8 200 248S210.8 272 224 272h8v64h-16C202.8 336 192 346.8 192 360S202.8 384 216 384h80c13.25 0 24-10.75 24-24S309.3 336 296 336zM256 192c17.67 0 32-14.33 32-32c0-17.67-14.33-32-32-32S224 142.3 224 160C224 177.7 238.3 192 256 192z"></path></svg></button></div></div><div class="col-12 panel__content section-content"><div class="panel__content--empty">No Shortlists</div></div></div></div></div><div id="payments"><div class="dashboard--main__panel"><div class="row"><div class="col-12 panel__header"><a class="panel__header--title" href="/payments/outgoing">My Payments</a></div><div class="col-12 panel__content section-content"><div class="panel__content--empty payment"><ul><li>Now you can quickly and securely pay talent on Backstage!</li><li>In the Application Manager, click the payment icon for an applicant to get started.</li><li>We’ll handle any required tax forms so you don’t have to.</li><li><a href="/member-benefits/creators/payments/" target="_blank" rel="noopener noreferrer">Learn more&gt;</a></li></ul></div></div></div></div></div><div id="notes"><div class="dashboard--main__panel"><div class="row"><div class="col-12 panel__header"><div class="panel__header--title">Recent Notes</div></div><div class="col-12 panel__content section-content" id="B1544033493071"><div class="panel__content--empty">You have not taken any notes yet</div></div></div></div></div><div id="profiles"><div class="dashboard--main__panel"><div class="row"><div class="col-12 panel__header"><div class="panel__header--title">Recently Viewed Applications</div></div><div class="col-12 panel__content section-content" id="recent-applications-section-contents"><div class="panel__content--empty">You have not viewed any applications yet.</div></div></div></div></div></div></div></div></div></div></div>
<div class="modal-container modal fade" id="rolesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal-container modal fade" id="alertModal" tabindex="-2" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true"></div>


    <div id="footer__container"><div id="backstage-footer"><div class="container-fluid footer--top"><div class="container"><div class="row"><div class="col-lg-2 col-md-4 col-sm-4 col-4 col-xxs-6"><ul><li class="title">FOR FINDING JOBS</li><li><a data-component="meta" data-section="performers" href="/actors-and-performers/" aria-label="Actors &amp; Performers">Actors &amp; Performers</a></li><li><a data-component="meta" data-section="performers" href="/voiceover-talent/" aria-label="Voiceover Artists">Voiceover Artists</a></li><li><a data-component="meta" data-section="performers" href="/crew-production-jobs/" aria-label="Creatives &amp; Production Crew">Creatives &amp; Production Crew</a></li><li><a data-component="meta" data-section="performers" href="/influencers-and-content-creators/" aria-label="Influencers + Content Creators">Influencers + Content Creators</a></li><li><a data-component="meta" data-section="performers" href="/models/" aria-label="Models">Models</a></li><li><a data-component="casting-search" data-section="performers" href="/casting/" aria-label="Search casting calls">Search Casting Calls</a></li><li><a data-component="casting-search" data-section="performers" href="/jobs-directory/" aria-label="Popular Auditions">Popular Auditions</a></li><li><a data-component="meta" data-section="performers" href="/member-benefits/performers/" aria-label="Learn how Backstage works for performers">How it Works</a></li><li><a data-component="editorial" data-section="performers" href="/magazine/category/advice/" aria-label="Browse advice and guides">Advice &amp; Guides</a></li><li><a data-component="editorial" data-section="performers" href="/magazine/topic/kids-and-teens/" aria-label="Read articles about child performers">Backstage Kids</a></li><li><a data-component="forums" data-section="performers" href="/forums/" aria-label="Go to Backstage Community">Community</a></li><li><a data-component="monologues" data-section="performers" href="/monologues/" aria-label="Search for monologues">Acting Monologues</a></li><li><a data-component="online-classes" data-section="performers" target="_blank" rel="noopener noreferrer" href="https://www.yellowbrick.co/arts/?utm_source=Backstage" aria-label="Nail Your Audition">Online Classes</a></li><li><a data-component="talent-profiles" data-section="performers" href="/profile/" aria-label="Create your free talent profile">Create Your Free Talent Profile</a></li></ul></div><div class="col-lg-2 col-md-4 col-sm-4 col-4 col-xxs-6"><ul><li class="title">FOR FINDING TALENT</li><li><a data-component="#" data-section="creators" href="/film-video-and-tv-casting/" aria-label="Film, Video &amp; TV Production">Film, Video &amp; TV Production</a></li><li><a data-component="#" data-section="creators" href="/theater-casting/" aria-label="Theater &amp; Performing Arts">Theater &amp; Performing Arts</a></li><li><a data-component="#" data-section="creators" href="/talent-for-voiceover-production/" aria-label="Voiceover Production">Voiceover Production</a></li><li><a data-component="#" data-section="creators" href="/talent-for-branded-and-social/" aria-label="Commercial + Branded Content">Commercial + Branded Content</a></li><li><a data-component="#" data-section="creators" href="/find-influencers-real-people-ugc/" aria-label="Influencers + UGC">Influencers + UGC</a></li><li><a data-component="meta" data-section="company" href="/for-brands-startups-media-companies/" aria-label="Companies &amp; NGOs">Companies &amp; NGOs</a></li><li><a data-component="talent-db" data-section="creators" href="/talent/" aria-label="Search the Talent Database">Talent Database</a></li><li><a data-component="payments" data-section="creators" href="/member-benefits/creators/payments/" aria-label="Pay Talent">Pay Talent</a></li><li><a data-component="post-a-job" data-section="creators" href="/member-benefits/creators/" aria-label="Learn how Backstage works for creators">How it Works</a></li><li><a data-component="editorial" data-section="creators" href="/magazine/category/creators/" aria-label="Browse advice and guides for creators">Advice for Creators</a></li><li><a data-component="post-a-job" data-section="creators" href="/cast-your-project/" aria-label="Post a job on Backstage">Post a Job</a></li></ul></div><div class="col-lg-2 col-md-4 col-sm-4 col-4 col-xxs-6"><ul><li class="title">COMPANY</li><li><a data-component="about-and-help" data-section="company" href="/about-us/" aria-label="Learn about Backstage">About</a></li><li><a data-component="meta" data-section="company" href="/careers/" aria-label="Learn about working at Backstage and see current openings">Careers</a></li><li><a data-component="meta" data-section="company" href="/partnership-information/" aria-label="Learn about partnering with Backstage">Partners</a></li><li><a href="/html-sitemap/" aria-label="Sitemap - Browse Backstage articles by subject">Sitemap</a></li><li><a href="/articles-by-subject/" aria-label="Sitemap - Browse Backstage articles archive">Articles Archive</a></li><li><a href="https://join.backstage.com/bulk-subscription/" aria-label="Group and School Subscriptions">Group and School Subscriptions</a></li></ul></div><div class="col-lg-2 col-md-4 col-sm-4 col-4 col-xxs-6"><ul><li class="title">SUPPORT</li><li><a data-component="about-and-help" data-section="support" href="https://backstage.zendesk.com/hc/en-us" aria-label="Get help using Backstage">Help</a></li><li><a data-component="about-and-help" data-section="support" href="https://backstage.zendesk.com/hc/en-us/requests/new" aria-label="Contact Backstage customer support">Contact</a></li><li><a data-component="subscribe-onboard" data-section="support" href="/pricing/" aria-label="See Backstage membership pricing">Pricing</a></li><li><a data-component="meta" data-section="support" href="/advertising-information" aria-label="Learn about advertising on Backstage">Advertising</a></li><li><a data-component="about-and-help" data-section="support" href="https://backstage.zendesk.com/hc/en-us/requests/new" aria-label="Report inappropriate content">Report Content</a></li></ul></div><div class="col-lg-2 col-md-4 col-sm-4 col-4 col-xxs-6 connect"><ul><li class="title">CONNECT</li><li><a data-social="facebook" data-section="connect" href="https://www.facebook.com/backstage" target="_blank" rel="noreferrer noopener nofollow" aria-label="Go to the Backstage Facebook page"><span class="icon facebook"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"></path></svg></span>Facebook</a></li><li><a data-social="twitter" data-section="connect" href="https://twitter.com/backstage" target="_blank" rel="noreferrer noopener nofollow" aria-label="Go to the Backstage X page"><span class="icon twitter"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="x-twitter" class="svg-inline--fa fa-x-twitter " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path></svg></span>X</a></li><li><a data-social="instagram" data-section="connect" href="https://www.instagram.com/backstagecast/" target="_blank" rel="noreferrer noopener nofollow" aria-label="Go to the Backstage Instagram page"><span class="icon instagram"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></span>Instagram</a></li><li><a data-social="tiktok" data-section="connect" href="https://www.tiktok.com/@backstagecasting" target="_blank" rel="noreferrer noopener nofollow" aria-label="Connect on Tiktok"><span class="icon tiktok"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="tiktok" class="svg-inline--fa fa-tiktok " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"></path></svg></span>Tiktok</a></li><li><a data-social="youtube" data-section="connect" href="https://www.youtube.com/user/BackStageCasting" target="_blank" rel="noreferrer noopener nofollow" aria-label="Go to the Backstage YouTube page"><span class="icon youtube"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg></span>YouTube</a></li><li><a data-social="itunes_podcast" data-section="connect" href="/podcasts/" aria-label="Listen to Backstage podcasts"><span class="icon podcast"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="headphones" class="svg-inline--fa fa-headphones " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 80C149.9 80 62.4 159.4 49.6 262c9.4-3.8 19.6-6 30.4-6c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48c-44.2 0-80-35.8-80-80V384 336 288C0 146.6 114.6 32 256 32s256 114.6 256 256v48 48 16c0 44.2-35.8 80-80 80c-26.5 0-48-21.5-48-48V304c0-26.5 21.5-48 48-48c10.8 0 21 2.1 30.4 6C449.6 159.4 362.1 80 256 80z"></path></svg></span>Podcast</a></li></ul></div></div><div class="row more-tools"><div class="col-lg-3 col-md-3 language"><div class="title">CHOOSE LANGUAGE</div><select class="select-dd white" aria-label="Select an option"><option value="en">English</option><option value="es">Español</option></select></div><div class="col-lg-5 col-md-5 newsletter"><div><label for="newsletterInputEmail" class="title">GET THE NEWSLETTER</label><div class="form-group"><div class="form-group email-form"><input autocomplete="email" class="form-control" type="email" id="newsletterInputEmail" placeholder="Enter email" value=""></div><button type="button" disabled="" class="d-inline-flex justify-content-center align-items-center btn-primary-sm text-nowrap">Submit</button></div></div></div><div class="col-lg-2 col-md-2 backstage-app"><label class="title">GET THE IOS APP</label><a data-component="meta" data-selection="GET THE IOS APP" href="https://itunes.apple.com/us/app/backstage-casting/id1215380527?mt=8" aria-label="Download the Backstage iOS app in the App Store" target="_blank" rel="noreferrer"><img alt="Get the iOS app" src="https://d3uscstcbhvk7k.cloudfront.net/static/2dc8eb3474f8b42a8255.svg" width="100%" height="100%"></a></div><div class="col-lg-2 col-md-2"><button type="button" id="ot-sdk-btn" class="d-inline-flex justify-content-center align-items-center btn-base btn-ghost btn-ghost-white-xs ot-sdk-show-settings text-nowrap">Manage Preferences</button></div></div><div class="copyright"><div class="copyright-text"><span>© 2025 Backstage. All rights reserved.</span></div><div class="tos-links"><a href="/terms-of-service/" aria-label="View the Backstage terms of service">Terms of Service</a> / <a href="/privacy-policy/" aria-label="View the Backstage Privacy Policy">Privacy Policy</a></div></div><div class="footer--bottom"><div class="logo"><img height="40" width="40" class="logo" alt="Backstage icon in footer" src="data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzODAuMTEgNDI0LjI0Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2ZmZjt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPkJhY2tzdGFnZV9JY29uX1doaXRlX1JHQjwvdGl0bGU+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMTcyLjczLDExLjY3djFhMTA2LDEwNiwwLDAsMSwwLDIxMC4xdjJhMTA2LDEwNiwwLDAsMSwwLDIxMC4wOXYxSDM5NC41OVYxMS42N1oiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0xNC40OCAtMTEuNjcpIi8+PHBvbHlnb24gY2xhc3M9ImNscy0xIiBwb2ludHM9IjAgMCAwIDQyNC4yNCAxNDMuNzUgNDI0LjI0IDE0Ni41NiA0MjQuMjQgMTQ2LjU2IDQyNC4xMSAxNDYuNTYgMjEyLjI0IDE0Ni41NiAyMTEuOTkgMTQ2LjU2IDAuMTMgMTQ2LjU2IDAgMCAwIi8+PC9zdmc+"><span>The most trusted name in casting since 1960.</span></div><div class="made-in"><span class="icon wrench"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wrench" class="svg-inline--fa fa-wrench " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7H336c-8.8 0-16-7.2-16-16V118.6c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160c0 19.1 3.4 37.5 9.5 54.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c17 6.2 35.4 9.5 54.5 9.5zM80 456c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24z"></path></svg></span><span class="text"><a href="/magazine/series/the-slate/">Made <s>in Brooklyn, NY</s> at home</a></span><span class="icon heart"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path></svg></span></div></div></div></div></div></div>
<div id="ios_banner__container"></div>


    

    
    <script src="https://d3uscstcbhvk7k.cloudfront.net/static/js/vendor.bundle.ca867826430e.js" charset="utf-8"></script>
    <script src="https://d3uscstcbhvk7k.cloudfront.net/static/js/common.bundle.28cb4d32cc3e.js" charset="utf-8"></script>
    

    
    <script>
        var CUID = 14336792;
        var dashboard_data = {"calendar": [], "production_listings": {"total_count": 1, "view": "all", "page": 1, "has_next": false, "data": [{"id": 2940858, "legacy_id": null, "simple_status": "Draft", "status": "D", "status_display": "Draft", "title": "Untitled Project - created on 04/01/2025", "created": "2025-04-01T11:19:42Z", "modified": "2025-04-01T11:20:24Z", "posted": null, "notification_preference_display": "", "expires": "2025-05-01T23:59:59Z", "user": 14336792, "roles": [], "public_url": "/casting/untitled-project-created-on-04012025-2940858/", "edit_url": "https://www.backstage.com/post_a_job/details/2940858", "collaborator_data": {}, "talent_profile_view": "G", "repost_eligibility": {"eligible": false, "reason": "invalid status"}, "production_types": [{"id": 60, "name": "Play", "parent_id": 55, "parent_name": "Theater", "casting_call_id": 2940858, "position": 1}], "talent_compensation": "P", "talent_compensation_extra": "", "pay_rate_minimum": null, "pay_rate_maximum": null, "pay_rate_currency": "USD", "pay_rate_frequency": "F", "pay_duration_type": "H", "pay_duration_length": null, "has_application_score": true, "sites": [], "applicant_counts": {"U": 0, "UN": 0, "B": 0, "BN": 0, "C": 0, "total": 0, "N": 0, "V": 0}}]}, "collaborators": {"total_count": 0, "data": []}, "recent_profiles": {"total_count": 0, "data": []}, "production_mappings": {"gender": {"M": "Male", "F": "Female", "B": "Unspecified"}, "ethnicity": {"5": "Asian", "3": "Black / African Descent", "10": "Ethnically Ambiguous / Multiracial", "7": "Indigenous Peoples", "4": "Latino / Hispanic", "8": "Middle Eastern", "6": "South Asian / Indian", "9": "Southeast Asian / Pacific Islander", "2": "White / European Descent"}, "production_status": {"D": "Draft", "P": "Pending Approval", "A": "Approved", "V": "Held for Review", "R": "Rejected", "H": "Hidden", "C": "Discarded", "Q": "Outstanding Questions"}, "production_notification": {"A": "As submissions come in", "D": "Daily Digest", "W": "Weekly Summary", "N": "Accepting online submissions, but do not send email notifications", "X": "Not accepting online submissions"}, "production_union": {"B": "Union And Nonunion", "U": "Union", "N": "Nonunion", "X": "N/A"}, "production_equity": {"1": "Auditions are being held", "2": "Seeking submissions from Stage Managers", "3": "Seeking submissions from actors/performers"}, "role_type": {"L": "Lead", "S": "Supporting", "D": "Day Player", "V": "Voiceover", "X": "Background / Extra", "C": "Chorus / Ensemble", "P": "Staff / Crew", "T": "Content Creators \u0026 Real People", "M": "Models", "N": "N/A"}, "role_status": {"A": "Active", "D": "Delisted"}, "collaborator_status": {"A": "Active", "L": "Limited", "D": "Deleted", "E": "Invited (Email)", "M": "Invited (Limited Email)"}, "asset_type": {"0": "Headshot/Photo", "1": "Video Reel", "2": "Audio Reel", "5": "Cover Letter", "3": "Video or Audio Reel", "4": "Resume"}}, "filter_choices": {"union_choices": [{"key": "0", "value": "Nonunion"}, {"key": "-1", "value": "Any Union"}], "body_type_choices": [{"key": "N", "value": "Average"}, {"key": "S", "value": "Slim"}, {"key": "A", "value": "Athletic / Toned"}, {"key": "M", "value": "Muscular"}, {"key": "C", "value": "Curvy"}, {"key": "H", "value": "Heavyset / Stocky"}, {"key": "O", "value": "Plus-Sized / Full-Figured"}], "gender_choices": [{"key": "M", "value": "Male"}, {"key": "F", "value": "Female"}, {"key": "B", "value": "Unspecified"}], "hair_color_choices": [{"key": "A", "value": "Black"}, {"key": "B", "value": "Brown"}, {"key": "C", "value": "Blond"}, {"key": "D", "value": "Auburn"}, {"key": "E", "value": "Chestnut"}, {"key": "F", "value": "Red"}, {"key": "G", "value": "Gray"}, {"key": "H", "value": "White"}, {"key": "I", "value": "Bald"}, {"key": "J", "value": "Salt \u0026 Pepper"}, {"key": "K", "value": "Strawberry Blond"}, {"key": "L", "value": "Multicolored/Dyed"}], "eye_color_choices": [{"key": "A", "value": "Amber"}, {"key": "K", "value": "Black"}, {"key": "B", "value": "Blue"}, {"key": "C", "value": "Brown"}, {"key": "D", "value": "Gray"}, {"key": "E", "value": "Green"}, {"key": "F", "value": "Hazel"}, {"key": "G", "value": "Red"}, {"key": "H", "value": "Violet"}], "ethnicity_choices": [{"key": 5, "value": "Asian"}, {"key": 3, "value": "Black / African Descent"}, {"key": 10, "value": "Ethnically Ambiguous / Multiracial"}, {"key": 7, "value": "Indigenous Peoples"}, {"key": 4, "value": "Latino / Hispanic"}, {"key": 8, "value": "Middle Eastern"}, {"key": 6, "value": "South Asian / Indian"}, {"key": 9, "value": "Southeast Asian / Pacific Islander"}, {"key": 2, "value": "White / European Descent"}], "asset_choices": [{"key": "headshot_available", "value": "Headshot/Photo"}, {"key": "video_reel_available", "value": "Video Reel"}, {"key": "voice_over_available", "value": "Audio Reel"}, {"key": "resume_available", "value": "Document"}, {"key": "cover_letter_available", "value": "Cover Letter"}], "currency_symbols": {"USD": "$", "EUR": "\u20ac", "GBP": "\u00a3", "CAD": "CA$", "AUD": "AU$", "NZD": "NZ$", "INR": "\u20b9", "ARS": "AR$", "ZAR": "R"}, "credit_type_choices": [{"key": "A", "value": "Theater"}, {"key": "B", "value": "Film"}, {"key": "C", "value": "Television"}, {"key": "U", "value": "User Generated Content (UGC)"}, {"key": "E", "value": "Commercials \u0026 Industrials"}, {"key": "F", "value": "Modeling"}, {"key": "G", "value": "Dance"}, {"key": "H", "value": "Music \u0026 Singing"}, {"key": "I", "value": "Comedy \u0026 Improv"}, {"key": "J", "value": "Voiceover"}, {"key": "K", "value": "Performing Arts"}, {"key": "L", "value": "Online \u0026 Multimedia"}, {"key": "D", "value": "Video"}, {"key": "M", "value": "Event"}], "currency_options": [["USD", "U.S. Dollar"], ["GBP", "Pound Sterling"], ["EUR", "Euros"], ["CAD", "Canadian Dollar"], ["AUD", "Australian Dollar"], ["NZD", "New Zealand Dollar"], ["INR", "Rupee"], ["ARS", "Argentine Peso"], ["ZAR", "South African Rand"]], "compensation_options": [["N", "No Pay"], ["D", "Deferred Pay"], ["S", "Stipend"], ["P", "Professional Pay"]], "expected_duration_options": [["H", "Less than a day"], ["D", "Less than a week"], ["W", "Less than month"], ["M", "More than a month"]], "years_in_industry_choices": [{"key": 0, "value": "Less than a year"}, {"key": 1, "value": "1-3 years"}, {"key": 3, "value": "3-6 years"}, {"key": 6, "value": "6+ years"}], "frequency_options": [["F", "Flat Rate"], ["H", "Hourly"], ["D", "Daily"], ["W", "Weekly"], ["M", "Monthly"], ["Y", "Salary"]], "pay_duration_types": [["H", "Hours"], ["D", "Days"], ["W", "Weeks"], ["M", "Months"], ["I", "Indefinite"]], "skill_group_choices": [{"key": 16, "value": "Post-Production (Video \u0026 Animation)"}, {"key": 23, "value": "Copy \u0026 Design"}, {"key": 31, "value": "Writing"}, {"key": 22, "value": "Directing"}, {"key": 29, "value": "Producing / Production Management"}, {"key": 28, "value": "Camera, Photography, Videography"}, {"key": 19, "value": "Hair \u0026 Makeup"}, {"key": 25, "value": "Wardrobe / Costume"}, {"key": 30, "value": "Audio (Sound \u0026 Music)"}, {"key": 20, "value": "Art \u0026 Props"}, {"key": 18, "value": "Lighting \u0026 Electrical"}, {"key": 17, "value": "Grips"}, {"key": 24, "value": "Locations \u0026 Unit"}, {"key": 26, "value": "Distribution / Multimedia Content Production"}, {"key": 21, "value": "Casting \u0026 Talent"}, {"key": 27, "value": "Other specializations"}]}, "recent_notes": {"total_count": 0, "data": []}, "production_titles": [{"id": 2940858, "title": "Untitled Project - created on 04/01/2025", "status": "D", "is_expired": false}], "tags": [{"id": 43273742, "name": "Extras", "default": true, "count": 0, "collaborators": [], "casting_call": null, "status": "A", "type": "T", "created_datetime": "2025-03-12T06:58:50Z", "updated_datetime": "2025-03-12T06:58:50Z", "user": 14336792, "base_tag": 82, "selected_name": null}, {"id": 43273741, "name": "Leads", "default": true, "count": 0, "collaborators": [], "casting_call": null, "status": "A", "type": "T", "created_datetime": "2025-03-12T06:58:50Z", "updated_datetime": "2025-03-12T06:58:50Z", "user": 14336792, "base_tag": 2, "selected_name": null}, {"id": 43273740, "name": "Saved", "default": true, "count": 0, "collaborators": [], "casting_call": null, "status": "A", "type": "T", "created_datetime": "2025-03-12T06:58:50Z", "updated_datetime": "2025-03-12T06:58:50Z", "user": 14336792, "base_tag": 1, "selected_name": null}], "payments": {"paid": [], "active": [], "counts": {"total_cancelled_unseen_seller": 0, "total_cancelled_unseen_seller_amount": 0.0, "total_cancelled_unseen_buyer": 0, "total_cancelled_unseen_buyer_amount": 0.0, "total_agent_acceptance_unseen_agent": 0, "total_agent_acceptance_unseen_agent_amount": 0.0, "total_review_unseen_buyer": 0, "total_review_unseen_buyer_amount": 0.0, "agent_acceptance": 0, "agent_acceptance_amount": 0.0, "total_talent_action_unseen_agent": 0, "total_talent_action_unseen_agent_amount": 0.0, "total_agent_acceptance": 0, "total_agent_acceptance_amount": 0.0, "total_paid": 0, "total_paid_amount": 0.0, "total_awaiting": 0, "total_awaiting_amount": 0.0, "talent_acceptance": 0, "talent_acceptance_amount": 0.0, "review": 0, "review_amount": 0.0, "awaiting": 0, "awaiting_amount": 0.0, "talent_action": 0, "talent_action_amount": 0.0, "total_paid_unseen_seller": 0, "total_paid_unseen_seller_amount": 0.0, "total_revision_requested_unseen_seller": 0, "total_revision_requested_unseen_seller_amount": 0.0, "total_acceptance": 0, "total_acceptance_amount": 0.0, "total_review": 0, "total_review_amount": 0.0, "active": 0, "active_amount": 0.0, "total_talent_action": 0, "total_talent_action_amount": 0.0, "acceptance": 0, "acceptance_amount": 0.0, "total_talent_acceptance": 0, "total_talent_acceptance_amount": 0.0, "paid": 0, "paid_amount": 0.0, "cancelled": 0, "cancelled_amount": 0.0, "total_new_unseen_seller": 0, "total_new_unseen_seller_amount": 0.0, "total_talent_action_unseen_seller": 0, "total_talent_action_unseen_seller_amount": 0.0, "total_cancelled": 0, "total_cancelled_amount": 0.0}}, "prescreen_questions": []};
        var app_manager_data = null;
        window.STATIC_URL = "https://d3uscstcbhvk7k.cloudfront.net/static/";
        var kmqAnalytics = {"user_id": 14336792, "user_email": "deepaksinghtomar527@gmail.com", "user_date_joined": "2025-03-12 06:58:50+00:00", "user_subscription_startdate": null, "user_employer": true, "user_saved_search_notifications": true, "user_bill_city": "Bhitarw\u0101r", "user_bill_postal_code": "474004", "user_bill_state": "Madhya Pradesh"};
    </script>
     <script src="https://d3uscstcbhvk7k.cloudfront.net/static/js/casting_dashboard.bundle.dd534fc1829d.js" charset="utf-8"></script>
     
<script type="text/javascript" id="" charset="">(function(a,b){var d="spdt-capture",e="script";if(!b.getElementById(d)){a.spdt=a.spdt||function(){(a.spdt.q=a.spdt.q||[]).push(arguments)};var c=b.createElement(e);c.id=d;c.async=1;c.src="https://pixel.byspotify.com/ping.min.js";b=b.getElementsByTagName(e)[0];b.parentNode.insertBefore(c,b)}a.spdt("conf",{key:"296fff7e4a9c4f69bb8c723f38aac9fd"});a.spdt("view")})(window,document);</script><!-- Start of backstage Zendesk Widget script -->
<script type="text/javascript">
  let zEInterval = 0;
  const isSmallScreen = document.documentElement.clientWidth < document.documentElement.clientHeight;
  zEInterval = setInterval(() => {
    if (window.zE && (window.esi_user_authenticated || isSmallScreen || window.location.href.includes('/casting/') || window.location.href.includes('/jobs/') )) {
      window.zE('messenger', 'hide');
      clearInterval(zEInterval);
    }
  }, 100);
</script>
<script defer="" id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=eda16603-d83d-4134-8bc8-ef242296aa93"></script><iframe height="0" width="0" style="display: none; visibility: hidden;"></iframe>
<div id="subwizard-container"><div class="modal-container modal fade" id="FreeTalentProfileWizardModal" role="dialog" aria-labelledby="FreeTalentProfileWizardModal" aria-hidden="true" tabindex="-1"><div class="modal-dialog"><div id="modal-content-FreeTalentProfileWizardModal" class="modal-content"><div class="modal-header"><div></div><button type="button" tabindex="-1" class="modal__btn--close"><span class="sr-only">close</span></button></div><div class="modal-footer"></div></div></div></div></div><!-- End of backstage Zendesk Widget script -->



    


    
        
            <script type="text/javascript">
                window.fbAsyncInit = function() {
                    FB.init({
                    appId : '111374926453', // App ID
                    status : true, // check login status
                    cookie : true, // enable cookies to allow the server to access the session
                    xfbml : true // parse XFBML
                    });
                };

                (function(d){
                    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                    if (d.getElementById(id)) {return;}
                    js = d.createElement('script'); js.id = id; js.async = true;
                    js.src = "//connect.facebook.net/en_US/all.js";
                    ref.parentNode.insertBefore(js, ref);
                }(document));
            </script>
        
    

    
        <script type="text/javascript">(function(){
var parsely=window.PARSELY=window.PARSELY||{};if(parsely._snippetVersion="1.0.0",!parsely.loaded)if(parsely._snippetInvoked)try{window.console&&console.error&&console.error("Parsely snippet included twice")}catch(e){}else{parsely._snippetInvoked=!0,parsely._stubs={onStart:[]},parsely._buildStub=function(e){return function(){parsely._stubs[e].push(arguments)}};for(var curStub in parsely._stubs)parsely._stubs.hasOwnProperty(curStub)&&(parsely[curStub]=parsely._buildStub(curStub))}parsely._load=function(e,s){s=void 0===s?"cdn.parsely.com":s;var r=document.createElement("script");r.id="parsely-cfg",r.type="text/javascript",r.async=!0,r.setAttribute("data-parsely-site",e),r.src="//"+s+"/keys/"+e+"/p.js",document.body.appendChild(r)};

parsely._load("backstage.com");
})();</script><script id="parsely-cfg" type="text/javascript" async="" data-parsely-site="backstage.com" src="//cdn.parsely.com/keys/backstage.com/p.js" class="optanon-category-C0003 "></script>

<script type="text/javascript">
var parselyPreload = {
  pageEventQueue: [],
  conversionEventQueue: [],
  linkClickEventQueue: [],
  purchaseEventQueue: [],
  subscriptionEventQueue: [],
  loaded: false,
};

function parselyTrackSubscription(eventName) {
    try {
        if (parselyPreload.loaded) {
            PARSELY.conversions.trackSubscription(eventName);
        } else {
            parselyPreload.subscriptionEventQueue.push(eventName);
        }
    }
    catch(error) {
        console.error('Parsley Subscription Tracking Exception: ', error);
    }
}

function parselyTrackPurchase(eventName) {
    try {
        if (parselyPreload.loaded) {
            PARSELY.conversions.trackPurchase(eventName);
        } else {
            parselyPreload.purchaseEventQueue.push(eventName);
        }
    }
    catch(error) {
        console.error('Parsley Purchase Tracking Exception: ', error);
    }
}

function parselyTrackLink(eventName) {
    try {
        if (parselyPreload.loaded) {
            PARSELY.conversions.trackLinkClick(eventName);
        } else {
            parselyPreload.linkClickEventQueue.push(eventName);
        }
    }
    catch(error) {
        console.error('Parsley Link Tracking Exception: ', error);
    }
}

function parselyTrackLeadConversion(eventName) {
    try {
        if (parselyPreload.loaded) {
            PARSELY.conversions.trackLeadCapture(eventName);
        } else {
            parselyPreload.conversionEventQueue.push(eventName);
        }
    }
    catch(error) {
        console.error('Parsley Lead Conversion Exception: ', error);
    }
}

function parselyTrackPageView(event) {
    try {
        if (parselyPreload.loaded) {
            PARSELY.beacon.trackPageView(event);
        } else {
            parselyPreload.pageEventQueue.push(event);
        }
    }
    catch(error) {
        console.error('Parsley Track Page Exception: ', error);
    }
}

PARSELY = window.PARSELY || {};
PARSELY.onload = function() {
    try {
        parselyPreload.loaded = true;
        for (var i = 0; i < parselyPreload.pageEventQueue.length; i++) {
            PARSELY.beacon.trackPageView(parselyPreload.pageEventQueue[i]);
        }
        for (var i = 0; i < parselyPreload.conversionEventQueue.length; i++) {
            PARSELY.conversions.trackLeadCapture(parselyPreload.conversionEventQueue[i]);
        }
        for (var i = 0; i < parselyPreload.linkClickEventQueue.length; i++) {
            PARSELY.conversions.trackLinkClick(parselyPreload.linkClickEventQueue[i]);
        }
        for (var i = 0; i < parselyPreload.purchaseEventQueue.length; i++) {
            PARSELY.conversions.trackPurchase(parselyPreload.purchaseEventQueue[i]);
        }
        for (var i = 0; i < parselyPreload.subscriptionEventQueue.length; i++) {
            PARSELY.conversions.trackSubscription(parselyPreload.subscriptionEventQueue[i]);
        }
    }
    catch(error) {
        console.error('Parsley exception: ', error);
    }
};
</script>

    

    
  <noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WBMS2S"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>


    <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9297b2928b443aa5',t:'MTc0MzUwNjQzMS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><iframe height="1" width="1" style="position: absolute; top: 0px; left: 0px; border: none; visibility: hidden;"></iframe>

<div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; width: 0px; height: 0px;"><div></div></div></div><style id="HW_styles_cont">.HW_badge_cont {
  visibility: hidden;
  pointer-events: none;
  display: block;
  cursor: pointer;
  position: relative;
  width: 32px;
  height: 32px;
}

.HW_absolute {
  position: absolute !important;
}

.HW_badge_cont.HW_visible {
  visibility: visible;
  pointer-events: auto;
}

.HW_badge {
  display: block;
  border-radius: 20px;
  background: #CD4B5B;
  height: 16px;
  width: 16px;
  color: #fff;
  text-align: center;
  line-height: 16px;
  font-size: 11px;
  cursor: pointer;
  position: absolute;
  top: 8px;
  left: 8px;
  opacity: 0;
  will-change: scale;
  transform: scale(0);
  transition: all 0.3s;
}

.HW_top {
  top: -16px;
}

.HW_bottom {
  bottom: -16px;
}

.HW_left {
  left: -16px;
}

.HW_right {
  right: -16px;
}

.HW_center, .HW_vcenter {
  left: 50%;
  margin-left: -16px;
}

.HW_center, .HW_hcenter {
  top: 50%;
  margin-top: -16px;
}

.HW_badge.HW_softHidden {
  background: #d4d4d4;
  opacity: 1;
  transform: scale(0.6);
}

.HW_badge.HW_hidden {
  opacity: 0;
  transform: scale(0);
}

.HW_badge.HW_visible {
  opacity: 1;
  transform: scale(1.0);
}

.HW_frame_cont {
  pointer-events: none;
  border-radius: 4px;
  box-shadow: 0 0 1px rgba(99, 114, 130, 0.32), 0 8px 16px rgba(27, 39, 51, 0.08);
  background: #fff;
  border: none;
  position: fixed;
  top: -900em;
  z-index: 2147483647;
  width: 340px;
  height: 0;
  opacity: 0;
  will-change: height, margin-top, opacity;
  margin-top: -10px;
  transition: margin-top 0.15s ease-out, opacity 0.1s ease-out;
  overflow: hidden;
}

.HW_frame_cont.HW_visible {
  opacity: 1;
  pointer-events: auto;
  margin-top: 0px;
}

.HW_frame_cont.HW_visible.HW_bottom {
  transition: margin-top 0.15s ease-out, opacity 0.1s ease-out, height 0.3s ease-out;
}

.HW_frame {
  background: #fff;
  border: none;
  width: 100%;
  overflow: hidden;
  border-radius: 4px;
  position: relative;
  z-index: 2147483647;
}

.HW_frame_cont.HW_embed {
  position: static;
  margin-top: 0;
}

.HW_notransition {
  transition: none !important;
}</style><div id="HW_frame_cont" class="HW_frame_cont HW_bottom" data-account="JmEOVJ" style="height: 349px;"><iframe id="HW_frame" class="HW_frame" src="https://headway-widget.net/widgets/JmEOVJ" referrerpolicy="strict-origin" sandbox="allow-same-origin allow-scripts allow-top-navigation allow-popups allow-forms allow-popups-to-escape-sandbox" tabindex="-1" aria-hidden="true" style="height: 349px;"></iframe></div><div id="onetrust-consent-sdk"><div class="onetrust-pc-dark-filter ot-hide ot-fade-in"></div><div id="onetrust-pc-sdk" class="otPcPanel ot-hide ot-fade-in right" lang="en" aria-label="Preference center" role="region"><div role="alertdialog" aria-modal="true" aria-describedby="ot-pc-desc" style="height: 100%;" aria-label="Privacy Preference Center"><!-- PC Header --><div class="ot-pc-header"><div class="ot-pc-logo" role="img" aria-label="Company Logo"><img alt="Company Logo" src="https://cdn.cookielaw.org/logos/static/ot_company_logo.png"></div><button id="close-pc-btn-handler" class="ot-close-icon" aria-label="Close" style="background-image: url(&quot;https://cdn.cookielaw.org/logos/static/ot_close.svg&quot;);"></button></div><div id="ot-pc-content" class="ot-pc-scrollbar"><div class="ot-optout-signal ot-hide"><div class="ot-optout-icon"><svg xmlns="http://www.w3.org/2000/svg"><path class="ot-floating-button__svg-fill" d="M14.588 0l.445.328c1.807 1.303 3.961 2.533 6.461 3.688 2.015.93 4.576 1.746 7.682 2.446 0 14.178-4.73 24.133-14.19 29.864l-.398.236C4.863 30.87 0 20.837 0 6.462c3.107-.7 5.668-1.516 7.682-2.446 2.709-1.251 5.01-2.59 6.906-4.016zm5.87 13.88a.75.75 0 00-.974.159l-5.475 6.625-3.005-2.997-.077-.067a.75.75 0 00-.983 1.13l4.172 4.16 6.525-7.895.06-.083a.75.75 0 00-.16-.973z" fill="#FFF" fill-rule="evenodd"></path></svg></div><span></span></div><h2 id="ot-pc-title">Privacy Preference Center</h2><div id="ot-pc-desc">Set your data preferences for this browser. Turning off data collection may impact your experience and services we can offer. For more information and choices, see below.
            <br><a href="https://www.backstage.com/privacy-policy/" class="privacy-notice-link" rel="noopener" target="_blank" aria-label="More information about your privacy, opens in a new tab">Privacy Policy </a></div><button id="accept-recommended-btn-handler">Accept All</button><section class="ot-sdk-row ot-cat-grp"><h3 id="ot-category-title"> Manage Consent Preferences</h3><div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0001"><button ot-accordion="true" aria-expanded="false" aria-controls="ot-desc-id-C0001" aria-labelledby="ot-header-id-C0001 ot-status-id-C0001"></button><!-- Accordion header --><div class="ot-acc-hdr ot-always-active-group"><div class="ot-plus-minus"><span></span><span></span></div><h4 class="ot-cat-header" id="ot-header-id-C0001">Strictly Necessary Cookies</h4><div id="ot-status-id-C0001" class="ot-always-active">Always Active</div></div><!-- accordion detail --><div class="ot-acc-grpcntr ot-acc-txt"><p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0001">These cookies are necessary for the website to function and cannot be switched off in our systems. They are usually only set in response to actions made by you which amount to a request for services, such as setting your privacy preferences, logging in or filling in forms. You can set your browser to block or alert you about these cookies, but some parts of the site will not then work. These cookies do not store any personally identifiable information.</p></div></div><div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0003"><button ot-accordion="true" aria-expanded="false" aria-controls="ot-desc-id-C0003" aria-labelledby="ot-header-id-C0003"></button><!-- Accordion header --><div class="ot-acc-hdr"><div class="ot-plus-minus"><span></span><span></span></div><h4 class="ot-cat-header" id="ot-header-id-C0003">Functional Cookies</h4><div class="ot-tgl"><input type="checkbox" name="ot-group-id-C0003" id="ot-group-id-C0003" role="switch" class="category-switch-handler" data-optanongroupid="C0003" checked="" aria-labelledby="ot-header-id-C0003"> <label class="ot-switch" for="ot-group-id-C0003"><span class="ot-switch-nob" aria-label="Functional Cookies"></span> <span class="ot-label-txt">Functional Cookies</span></label> </div></div><!-- accordion detail --><div class="ot-acc-grpcntr ot-acc-txt"><p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0003">These cookies enable the website to provide enhanced functionality and personalisation. They may be set by us or by third party providers whose services we have added to our pages. If you do not allow these cookies then some or all of these services may not function properly.</p></div></div><div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0002"><button ot-accordion="true" aria-expanded="false" aria-controls="ot-desc-id-C0002" aria-labelledby="ot-header-id-C0002"></button><!-- Accordion header --><div class="ot-acc-hdr"><div class="ot-plus-minus"><span></span><span></span></div><h4 class="ot-cat-header" id="ot-header-id-C0002">Performance Cookies</h4><div class="ot-tgl"><input type="checkbox" name="ot-group-id-C0002" id="ot-group-id-C0002" role="switch" class="category-switch-handler" data-optanongroupid="C0002" checked="" aria-labelledby="ot-header-id-C0002"> <label class="ot-switch" for="ot-group-id-C0002"><span class="ot-switch-nob" aria-label="Performance Cookies"></span> <span class="ot-label-txt">Performance Cookies</span></label> </div></div><!-- accordion detail --><div class="ot-acc-grpcntr ot-acc-txt"><p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0002">These cookies allow us to count visits and traffic sources so we can measure and improve the performance of our site. They help us to know which pages are the most and least popular and see how visitors move around the site. All information these cookies collect is aggregated and therefore anonymous. If you do not allow these cookies we will not know when you have visited our site, and will not be able to monitor its performance.</p></div></div><div class="ot-accordion-layout ot-cat-item ot-vs-config" data-optanongroupid="C0004"><button ot-accordion="true" aria-expanded="false" aria-controls="ot-desc-id-C0004" aria-labelledby="ot-header-id-C0004"></button><!-- Accordion header --><div class="ot-acc-hdr"><div class="ot-plus-minus"><span></span><span></span></div><h4 class="ot-cat-header" id="ot-header-id-C0004">Targeting Cookies</h4><div class="ot-tgl"><input type="checkbox" name="ot-group-id-C0004" id="ot-group-id-C0004" role="switch" class="category-switch-handler" data-optanongroupid="C0004" checked="" aria-labelledby="ot-header-id-C0004"> <label class="ot-switch" for="ot-group-id-C0004"><span class="ot-switch-nob" aria-label="Targeting Cookies"></span> <span class="ot-label-txt">Targeting Cookies</span></label> </div></div><!-- accordion detail --><div class="ot-acc-grpcntr ot-acc-txt"><p class="ot-acc-grpdesc ot-category-desc" id="ot-desc-id-C0004">These cookies may be set through our site by our advertising partners. They may be used by those companies to build a profile of your interests and show you relevant adverts on other sites. They do not store directly personal information, but are based on uniquely identifying your browser and internet device. If you do not allow these cookies, you will experience less targeted advertising.</p></div></div><!-- Non Accordion Group --><!-- Accordion Group section starts --><!-- Accordion Group section ends --></section></div><section id="ot-pc-lst" class="ot-hide ot-pc-scrollbar"><div id="ot-pc-hdr"><div id="ot-lst-title"><button class="ot-link-btn back-btn-handler" aria-label="Back"><svg id="ot-back-arw" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 444.531 444.531" xml:space="preserve"><title>Back Button</title><g><path fill="#656565" d="M213.13,222.409L351.88,83.653c7.05-7.043,10.567-15.657,10.567-25.841c0-10.183-3.518-18.793-10.567-25.835
          l-21.409-21.416C323.432,3.521,314.817,0,304.637,0s-18.791,3.521-25.841,10.561L92.649,196.425
          c-7.044,7.043-10.566,15.656-10.566,25.841s3.521,18.791,10.566,25.837l186.146,185.864c7.05,7.043,15.66,10.564,25.841,10.564
          s18.795-3.521,25.834-10.564l21.409-21.412c7.05-7.039,10.567-15.604,10.567-25.697c0-10.085-3.518-18.746-10.567-25.978
          L213.13,222.409z"></path></g></svg></button><h3>Cookie List</h3></div><div class="ot-lst-subhdr"><div class="ot-search-cntr"><p role="status" class="ot-scrn-rdr"></p><input id="vendor-search-handler" type="text" name="vendor-search-handler" placeholder="Search…" aria-label="Cookie list search"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 -30 110 110" aria-hidden="true"><title>Search Icon</title><path fill="#2e3644" d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
            s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
            c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
            s-17-7.626-17-17S14.61,6,23.984,6z"></path></svg></div><div class="ot-fltr-cntr"><button id="filter-btn-handler" aria-label="Filter" aria-haspopup="true"><svg role="presentation" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 402.577 402.577" xml:space="preserve"><title>Filter Icon</title><g><path fill="#fff" d="M400.858,11.427c-3.241-7.421-8.85-11.132-16.854-11.136H18.564c-7.993,0-13.61,3.715-16.846,11.136
      c-3.234,7.801-1.903,14.467,3.999,19.985l140.757,140.753v138.755c0,4.955,1.809,9.232,5.424,12.854l73.085,73.083
      c3.429,3.614,7.71,5.428,12.851,5.428c2.282,0,4.66-0.479,7.135-1.43c7.426-3.238,11.14-8.851,11.14-16.845V172.166L396.861,31.413
      C402.765,25.895,404.093,19.231,400.858,11.427z"></path></g></svg></button></div><div id="ot-anchor"></div><section id="ot-fltr-modal"><div id="ot-fltr-cnt"><button id="clear-filters-handler">Clear</button><div class="ot-fltr-scrlcnt ot-pc-scrollbar"><div class="ot-fltr-opts"><div class="ot-fltr-opt"><div class="ot-chkbox"><input id="chkbox-id" type="checkbox" class="category-filter-handler"> <label for="chkbox-id"><span class="ot-label-txt">checkbox label</span></label> <span class="ot-label-status">label</span></div></div></div><div class="ot-fltr-btns"><button id="filter-apply-handler">Apply</button> <button id="filter-cancel-handler">Cancel</button></div></div></div></section></div></div><section id="ot-lst-cnt" class="ot-pc-scrollbar"><div id="ot-sel-blk"><div class="ot-sel-all"><div class="ot-sel-all-hdr"><span class="ot-consent-hdr">Consent</span> <span class="ot-li-hdr">Leg.Interest</span></div><div class="ot-sel-all-chkbox"><div class="ot-chkbox" id="ot-selall-hostcntr"><input id="select-all-hosts-groups-handler" type="checkbox"> <label for="select-all-hosts-groups-handler"><span class="ot-label-txt">checkbox label</span></label> <span class="ot-label-status">label</span></div><div class="ot-chkbox" id="ot-selall-vencntr"><input id="select-all-vendor-groups-handler" type="checkbox"> <label for="select-all-vendor-groups-handler"><span class="ot-label-txt">checkbox label</span></label> <span class="ot-label-status">label</span></div><div class="ot-chkbox" id="ot-selall-licntr"><input id="select-all-vendor-leg-handler" type="checkbox"> <label for="select-all-vendor-leg-handler"><span class="ot-label-txt">checkbox label</span></label> <span class="ot-label-status">label</span></div></div></div></div><div class="ot-sdk-row"><div class="ot-sdk-column"></div></div></section></section><!-- Footer buttons and logo --><div class="ot-pc-footer ot-pc-scrollbar"><div class="ot-btn-container"><button class="ot-pc-refuse-all-handler">Reject All</button> <button class="save-preference-btn-handler onetrust-close-btn-handler">Confirm My Choices</button></div><div class="ot-pc-footer-logo"><a href="https://www.onetrust.com/products/cookie-consent/" target="_blank" rel="noopener noreferrer" aria-label="Powered by OneTrust Opens in a new Tab"><img alt="Powered by Onetrust" src="https://cdn.cookielaw.org/logos/static/powered_by_logo.svg" title="Powered by OneTrust Opens in a new Tab"></a></div></div><!-- Cookie subgroup container --><!-- Vendor list link --><!-- Cookie lost link --><!-- Toggle HTML element --><!-- Checkbox HTML --><!-- Arrow SVG element --><!-- plus minus--><!-- Accordion basic element --><span class="ot-scrn-rdr" aria-atomic="true" aria-live="polite"></span><!-- Vendor Service container and item template --></div><iframe class="ot-text-resize" sandbox="allow-same-origin" title="onetrust-text-resize" style="position: absolute; top: -50000px; width: 100em;" aria-hidden="true"></iframe></div><div id="ot-sdk-btn-floating" class="ot-floating-button" data-title="Manage Preferences"><div class="ot-floating-button__front custom-persistent-icon"><button type="button" class="ot-floating-button__open" aria-label="Open Preferences"></button></div><div class="ot-floating-button__back custom-persistent-icon"><button type="button" class="ot-floating-button__close" aria-label="Close Preferences" aria-hidden="true" style="display: none;"><!--?xml version="1.0" encoding="UTF-8"?--> <svg role="presentation" tabindex="-1" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Banner_02" class="ot-floating-button__svg-fill" transform="translate(-318.000000, -725.000000)" fill="#ffffff" fill-rule="nonzero"><g id="Group-2" transform="translate(305.000000, 712.000000)"><g id="icon/16px/white/close"><polygon id="Line1" points="13.3333333 14.9176256 35.0823744 36.6666667 36.6666667 35.0823744 14.9176256 13.3333333"></polygon><polygon id="Line2" transform="translate(25.000000, 25.000000) scale(-1, 1) translate(-25.000000, -25.000000) " points="13.3333333 14.9176256 35.0823744 36.6666667 36.6666667 35.0823744 14.9176256 13.3333333"></polygon></g></g></g></g></svg></button></div></div></div><script type="text/javascript" id="" charset="">"object"!==typeof window.ju_options&&(window.ju_options={});window.ju_options.targeting=window.ju_options.targeting||{};window.ju_options.targeting.esi_user_email=null===window.esi_user_email?"0":window.esi_user_email;window.ju_options.targeting.esi_user_subscriber_state=null===window.esi_user_subscriber_state?"0":window.esi_user_subscriber_state;window.ju_options.targeting.IOS_App_Installed=null===window.IOS_App_Installed?"0":window.IOS_App_Installed;window.ju_options.targeting.User_Agent=navigator.userAgent;
if("object"===typeof window._EsiSubscriptionData)for(var propt in window._EsiSubscriptionData)window.ju_options.targeting[propt]=window._EsiSubscriptionData[propt];</script>
<script type="text/javascript" id="" charset="">(function(a,c,e,f,d,b){a.hj=a.hj||function(){(a.hj.q=a.hj.q||[]).push(arguments)};a._hjSettings={hjid:773252,hjsv:6};d=c.getElementsByTagName("head")[0];b=c.createElement("script");b.async=1;b.src=e+a._hjSettings.hjid+f+a._hjSettings.hjsv;d.appendChild(b)})(window,document,"https://static.hotjar.com/c/hotjar-",".js?sv\x3d");</script>
<script type="text/javascript" id="" charset="">!function(a,b){if(!a.rdt){var c=a.rdt=function(){c.sendEvent?c.sendEvent.apply(c,arguments):c.callQueue.push(arguments)};c.callQueue=[];a=b.createElement("script");a.src="https://www.redditstatic.com/ads/pixel.js";a.async=!0;b=b.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}}(window,document);rdt("init","t2_1fpv0zv5");rdt("track","PageVisit");</script>



<script type="text/javascript" id="" charset="">(function(){var c="4.0.0",h="39275",k="term\x3dvalue";try{var f=top.document.referer!==""?encodeURIComponent(top.document.referrer.substring(0,2048)):""}catch(g){f=document.referrer!==null?document.referrer.toString().substring(0,2048):""}try{var a=window&&window.top&&document.location&&window.top.location===document.location?document.location:window&&window.top&&window.top.location&&""!==window.top.location?window.top.location:document.location}catch(g){a=document.location}try{var d=parent.location.href!==
""?encodeURIComponent(parent.location.href.toString().substring(0,2048)):""}catch(g){try{d=a!==null?encodeURIComponent(a.toString().substring(0,2048)):""}catch(l){d=""}}var e;a=document.createElement("script");var b=document.getElementsByTagName("script");b=Number(b.length)-1;b=document.getElementsByTagName("script")[b];typeof e==="undefined"&&(e=Math.floor(Math.random()*1E17));c="dx.mountain.com/spx?dxver\x3d"+c+"\x26shaid\x3d"+h+"\x26tdr\x3d"+f+"\x26plh\x3d"+d+"\x26cb\x3d"+e+k;a.type="text/javascript";
a.src=("https:"===document.location.protocol?"https://":"http://")+c;b.parentNode.insertBefore(a,b)})();</script><div id="batBeacon620596772301" style="width: 0px; height: 0px; display: none; visibility: hidden;"><img id="batBeacon327009042366" width="0" height="0" alt="" src="https://bat.bing.com/action/0?ti=187121075&amp;tm=gtm002&amp;Ver=2&amp;mid=5653f279-44d0-445c-b521-4edd882329ef&amp;bo=1&amp;sid=3f1070e00d8411f0a6386150be115868&amp;vid=f9f24710f67a11ef817253f2e2e15c84&amp;vids=0&amp;msclkid=N&amp;gtm_tag_source=1&amp;uach=pv%3D10.0.0&amp;pi=918639831&amp;lg=en-US&amp;sw=1280&amp;sh=720&amp;sc=24&amp;tl=Casting%20Dashboard&amp;p=https%3A%2F%2Fwww.backstage.com%2Fcasting_director%2Fmanage%2Fall%2F&amp;r=https%3A%2F%2Fwww.backstage.com%2Fpost_a_job%2Fdetails%2F2940858%2F&amp;lt=5610&amp;mtp=10&amp;evt=pageLoad&amp;sv=1&amp;cdb=AQET&amp;rn=560586" style="width: 0px; height: 0px; display: none; visibility: hidden;"></div><iframe data-product="web_widget" title="No content" role="presentation" tabindex="-1" allow="microphone *" aria-hidden="true" src="about:blank" style="width: 0px; height: 0px; border: 0px; position: absolute; top: -9999px;"></iframe><iframe id="_hjSafeContext_98310198" title="_hjSafeContext" tabindex="-1" aria-hidden="true" src="about:blank" style="display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;"></iframe><div style="visibility: hidden;"><div></div><div><style>
        @-webkit-keyframes ww-7302db64-69a2-46b4-a93f-0b7122909572-launcherOnOpen {
          0% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }

          30% {
            -webkit-transform: translateY(-5px) rotate(2deg);
                    transform: translateY(-5px) rotate(2deg);
          }

          60% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }


          90% {
            -webkit-transform: translateY(-1px) rotate(0deg);
                    transform: translateY(-1px) rotate(0deg);

          }

          100% {
            -webkit-transform: translateY(-0px) rotate(0deg);
                    transform: translateY(-0px) rotate(0deg);
          }
        }
        @keyframes ww-7302db64-69a2-46b4-a93f-0b7122909572-launcherOnOpen {
          0% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }

          30% {
            -webkit-transform: translateY(-5px) rotate(2deg);
                    transform: translateY(-5px) rotate(2deg);
          }

          60% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }


          90% {
            -webkit-transform: translateY(-1px) rotate(0deg);
                    transform: translateY(-1px) rotate(0deg);

          }

          100% {
            -webkit-transform: translateY(-0px) rotate(0deg);
                    transform: translateY(-0px) rotate(0deg);
          }
        }

        @keyframes ww-7302db64-69a2-46b4-a93f-0b7122909572-widgetOnLoad {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }

        @-webkit-keyframes ww-7302db64-69a2-46b4-a93f-0b7122909572-widgetOnLoad {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }
      </style><iframe title="Button to launch messaging window" id="launcher" style="color-scheme: light; height: 64px; width: 64px; position: fixed; bottom: 16px; right: 16px; border: 0px; margin-top: 0px; opacity: 0; box-shadow: rgba(23, 73, 77, 0.15) 0px 20px 30px; animation: 0.2s ease-in 0.5s 1 normal forwards running ww-7302db64-69a2-46b4-a93f-0b7122909572-widgetOnLoad; z-index: 999999; border-radius: 50%;"></iframe></div></div><div id="_elev_io" class="elevioReset _elevio_widget">
      <div style="width: 400px" class="_iw3lm _h9ior   _1kydm">
        <div class="_1a5o2">
          <div class="_vvuy8">
            <div class="_1mb2j">
      <div style="background-color: #141414;" class="_45r9y _elevio_navbar">
        <div class="_1pzly _jfgu2 _o5o5x">
      <div>
        <svg viewBox="0 0 34 60">
          <path d="M1.2,32.8l26,26c0.7,0.7,1.7,1.2,2.8,1.2c2.2,0,4-1.8,4-4c0-1.1-0.4-2.1-1.2-2.8L9.7,30 L32.8,6.8C33.6,6.1,34,5.1,34,4c0-2.2-1.8-4-4-4c-1.1,0-2.1,0.4-2.8,1.2l-26,26C0.4,27.9,0,28.9,0,30C0,31.1,0.4,32.1,1.2,32.8z"></path>
        </svg>
      </div>
    </div>
        <div class="_tg3i2 _jfgu2 ">
      <div>
        <svg viewBox="0 0 60 60">
          <g>
            <path d="M56,52H4c-2.2,0-4,1.8-4,4c0,2.2,1.8,4,4,4h52c2.2,0,4-1.8,4-4C60,53.8,58.2,52,56,52z"></path>
            <path d="M4,8h52c2.2,0,4-1.8,4-4c0-2.2-1.8-4-4-4H4C1.8,0,0,1.8,0,4C0,6.2,1.8,8,4,8z"></path>
            <path d="M56,26H4c-2.2,0-4,1.8-4,4c0,2.2,1.8,4,4,4h52c2.2,0,4-1.8,4-4C60,27.8,58.2,26,56,26z"></path>
          </g>
        </svg>
      </div>
    </div>
        <div class="_ir0vf _jfgu2">
      <div class="_elevio_close">
        <svg viewBox="0 0 60 60">
          <path d="M35.7,30L58.8,6.8C59.6,6.1,60,5.1,60,4c0-2.2-1.8-4-4-4c-1.1,0-2.1,0.4-2.8,1.2L30,24.3
          L6.8,1.2C6.1,0.4,5.1,0,4,0C1.8,0,0,1.8,0,4c0,1.1,0.4,2.1,1.2,2.8L24.3,30L1.2,53.2C0.4,53.9,0,54.9,0,56c0,2.2,1.8,4,4,4
          c1.1,0,2.1-0.4,2.8-1.2L30,35.7l23.2,23.2c0.7,0.7,1.7,1.2,2.8,1.2c2.2,0,4-1.8,4-4c0-1.1-0.4-2.1-1.2-2.8L35.7,30z"></path>
        </svg>
      </div>
    </div>
        <div class="_147ki _ahxts">
          Help Center
        </div>
      </div>
      <div class="_8vnd0 _1vct9">
      <div style="visibility: hidden; position: absolute;">
        Username <input type="text" name="username">
      </div>
      <span id="_elev_io" class="elevioReset _elevio_search _1xk6s ">
      <div id="_elev_io_placebo" class="_rqmwn ">
      <span class="_10b1r _elevio_search_icon_container">
        <svg viewBox="0 0 60 60" class="_elevio_search_icon">
      <path d="M58.8,53.2L48.7,43.1C52,38.6,54,33,54,27C54,12.1,41.9,0,27,0S0,12.1,0,27s12.1,27,27,27
      c6,0,11.6-2,16.1-5.3l10.1,10.1c0.7,0.7,1.7,1.2,2.8,1.2c2.2,0,4-1.8,4-4C60,54.9,59.6,53.9,58.8,53.2z M8,27C8,16.5,16.5,8,27,8
      s19,8.5,19,19s-8.5,19-19,19S8,37.5,8,27z"></path>
    </svg>
      </span>
      <input id="_elev_io_placebo" type="search" aria-label="Search" placeholder="Search for help" value="" autocomplete="off" tabindex="-1" class="_1gzja _jta9z _elevio_search_input">
      <div class="_jch0b"></div>
    </div>
      <div class="_17k2i _elevio_search_results">
        
      </div>
    </span>
    </div> 
    </div>
          </div>
          <div class="_vl1mm _8r6n5">
      <div style="padding-top: 25px;" class="_yfy7b">
        <div style="transform: scale(1); opacity: 1; visibility: visible">
          <div id="_elev_io" class="elevioReset _i7sdo">
      <style>
        ._4fjpa:hover ._d9ggd {
          background-color: #141414 !important;
        }
      </style>
      <div class="_cnzpc">
        <div><div class="_4fjpa _elevio_module_icon _elevio_module_icon_1">
        <div class="_d9ggd"><div><svg viewBox="0 0 24 24"><path d="M18 22.001a1 1 0 0 1-.555-.168L12 18.203l-5.445 3.63a1 1 0 0 1-1.516-1.106l1.838-6.435-4.584-4.584A1.001 1.001 0 0 1 3 8.001h5.382l2.724-5.447c.339-.677 1.45-.677 1.789 0l2.724 5.447H21a1 1 0 0 1 .707 1.707l-4.584 4.584 1.838 6.435A1 1 0 0 1 18 22.001zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384a.996.996 0 0 1 .254-.982l3.293-3.293H15c-.379 0-.725-.214-.895-.553L12 5.237 9.895 9.448c-.17.339-.516.553-.895.553H5.414l3.293 3.293a1 1 0 0 1 .254.982L7.709 18.66l3.736-2.491c.168-.111.362-.168.555-.168z"></path></svg></div></div>
        <div class="_1bt1k">Advice and Guides</div>
      </div><div class="_4fjpa _elevio_module_icon _elevio_module_icon_18">
        <div class="_d9ggd"><div><svg viewBox="0 0 24 24"><path d="M20.998 24l-5.334-4h-3.166c-.827 0-1.5-.673-1.5-1.5v-7c0-.827.673-1.5 1.5-1.5h10c.827 0 1.5.673 1.5 1.5v7c0 .827-.673 1.5-1.5 1.5h-1.5v4zm-8-6h3.334l2.666 2v-2h3v-6h-9v6z"></path><path d="M2.998 20v-4h-1.5c-.827 0-1.5-.673-1.5-1.5v-11c0-.827.673-1.5 1.5-1.5h13c.827 0 1.5.673 1.5 1.5v4.498h-2V4h-12v10h3v2l2.666-2h1.334v2h-.666l-5.334 4z"></path></svg></div></div>
        <div class="_1bt1k">Chat to Support</div>
      </div></div>
      </div>
    </div>
        </div>
      </div>
      <div style="top: 132px;" class="_1mpem">
        
      </div>
    </div>
          <div class="_hp049"><div class="_sbgx4 _1lnko">
      <a rel="nofollow"> Elevio by Dixa </a>
    </div></div>
        </div>
      </div>
    </div><iframe allow="join-ad-interest-group" data-tagging-id="AW-988619162" data-load-time="1743506438429" height="0" width="0" src="https://td.doubleclick.net/td/rul/988619162?random=1743506438381&amp;cv=11&amp;fst=1743506438381&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be53s1v9137352191za200&amp;gcd=13r3r3r3r5l1&amp;dma=0&amp;tag_exp=102482433~102788824~102803279~102813109~102887800~102926062~102964103~102975949~102976415&amp;u_w=1280&amp;u_h=720&amp;url=https%3A%2F%2Fwww.backstage.com%2Fcasting_director%2Fmanage%2Fall%2F&amp;ref=https%3A%2F%2Fwww.backstage.com%2Fpost_a_job%2Fdetails%2F2940858%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Casting%20Dashboard&amp;did=dYWJhMj&amp;gdid=dYWJhMj&amp;npa=0&amp;pscdl=noapi&amp;auid=748674393.1740819356&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B134.0.6998.178%7CNot%253AA-Brand%3B24.0.0.0%7CGoogle%2520Chrome%3B134.0.6998.178&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dgtag.config" style="display: none; visibility: hidden;"></iframe><div id="_elev_io" style="" class="_elevio_launcher elevioReset">
      <div>
        <div class="_1g6cj _6byvm _zvdyj">
          <button style="background-color:#141414;" class="_bhq21 _1g611">
            <span class="_1n7sq">
      <svg viewBox="0 0 74.2 74.2">
        <g>
          <path d="M37.1,74.2C16.7,74.2,0,57.6,0,37.1S16.7,0,37.1,0s37.1,16.7,37.1,37.1S57.6,74.2,37.1,74.2z M37.1,4.8C19.3,4.8,4.8,19.3,4.8,37.1c0,17.8,14.5,32.3,32.3,32.3s32.3-14.5,32.3-32.3C69.4,19.3,54.9,4.8,37.1,4.8z"></path>
          <g>
            <path id="XMLID_17_" d="M29.4,22.7c1.9-2.1,4.6-3.1,8-3.1c3.1,0,5.6,0.9,7.5,2.6s2.8,4,2.8,6.7c0,1.7-0.3,3-1,4 c-0.7,1-2.1,2.6-4.2,4.6c-1.5,1.5-2.5,2.7-3,3.7c-0.3,0.7-0.5,1.5-0.6,2.6c-0.1,1.1-1,1.9-2.1,1.9h0c-1.2,0-2.2-1-2.1-2.3 c0.1-1.2,0.4-2.3,0.7-3.1c0.5-1.4,1.7-2.9,3.6-4.7l1.9-1.9c0.6-0.5,1-1.1,1.4-1.7c0.6-1,1-2.1,1-3.2c0-1.5-0.5-2.9-1.4-4 c-0.9-1.1-2.5-1.7-4.6-1.7c-2.7,0-4.5,1-5.5,2.9c-0.4,0.7-0.7,1.7-0.8,2.8c-0.1,1-1,1.8-2.1,1.8h0c-1.3,0-2.3-1.1-2.1-2.4 C27.1,26.2,28,24.3,29.4,22.7z M36.9,49.7L36.9,49.7c1.3,0,2.3,1,2.3,2.3v0.2c0,1.3-1,2.3-2.3,2.3h0c-1.3,0-2.3-1-2.3-2.3V52 C34.5,50.7,35.6,49.7,36.9,49.7z" class="st0"></path>
          </g>
        </g>
      </svg>
    </span>
            <span class="_bzf50"> Guides &amp; Live Chat </span>
          </button>
        </div>
      </div>
    </div><iframe name="__privateStripeMetricsController3830" frameborder="0" allowtransparency="true" scrolling="no" role="presentation" allow="payment *" src="https://js.stripe.com/v3/m-outer-3437aaddcdf6922d623e172c2d6f9278.html#url=https%3A%2F%2Fwww.backstage.com%2Fcasting_director%2Fmanage%2Fall%2F&amp;title=Casting%20Dashboard&amp;referrer=https%3A%2F%2Fwww.backstage.com%2Fpost_a_job%2Fdetails%2F2940858%2F&amp;muid=440bf2b3-9b71-49ea-8a0b-e8f0a79a47cc7aaea2&amp;sid=92b0d60c-10b5-45d1-a63f-6e5ebebd6b072d5961&amp;version=6&amp;preview=false&amp;__shared_params__[version]=v3" aria-hidden="true" tabindex="-1" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; visibility: hidden !important; position: fixed !important; height: 1px !important; pointer-events: none !important; user-select: none !important;"></iframe><script src="https://device.maxmind.com/js/device.js"></script>
<div class="go2933276541 go2369186930" id="hs-web-interactives-top-anchor"><div id="hs-interactives-modal-overlay" class="go1632949049"></div></div>
<div class="go2933276541 go1348078617" id="hs-web-interactives-bottom-anchor"></div>
<div id="hs-web-interactives-floating-container">
  <div id="hs-web-interactives-floating-top-left-anchor" class="go2417249464 go613305155">
  </div>
  <div id="hs-web-interactives-floating-top-right-anchor" class="go2417249464 go471583506">
  </div>
  <div id="hs-web-interactives-floating-bottom-left-anchor" class="go2417249464 go3921366393">
  </div>
  <div id="hs-web-interactives-floating-bottom-right-anchor" class="go2417249464 go3967842156">
  </div>
</div>

@endsection