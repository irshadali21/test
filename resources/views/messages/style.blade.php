<style>
    @import url(https://fonts.googleapis.com/css?family=Public+Sans:wght@400,500,600&display=swap);@charset "UTF-8";



.waves-effect {
  position: relative;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
}

.waves-effect .waves-ripple {
  position: absolute;
  border-radius: 50%;
  width: 100px;
  height: 100px;
  margin-top: -50px;
  margin-left: -50px;
  opacity: 0;
  background: rgba(0, 0, 0, 0.2);
  background: radial-gradient(rgba(0, 0, 0, 0.2) 0, rgba(0, 0, 0, 0.3) 40%, rgba(0, 0, 0, 0.4) 50%, rgba(0, 0, 0, 0.5) 60%, rgba(255, 255, 255, 0) 70%);
  transition: all 0.5s ease-out;
  transition-property: transform, opacity;
  transform: scale(0) translate(0, 0);
  pointer-events: none;
}

.waves-effect.waves-light .waves-ripple {
  background: rgba(255, 255, 255, 0.4);
  background: radial-gradient(rgba(255, 255, 255, 0.2) 0, rgba(255, 255, 255, 0.3) 40%, rgba(255, 255, 255, 0.4) 50%, rgba(255, 255, 255, 0.5) 60%, rgba(255, 255, 255, 0) 70%);
}

.waves-effect.waves-classic .waves-ripple {
  background: rgba(0, 0, 0, 0.2);
}

.waves-effect.waves-classic.waves-light .waves-ripple {
  background: rgba(255, 255, 255, 0.4);
}

.waves-notransition {
  transition: none !important;
}

.waves-button,
.waves-circle {
  transform: translateZ(0);
  -webkit-mask-image: -webkit-radial-gradient(circle, white 100%, black 100%);
}

.waves-button,
.waves-button:hover,
.waves-button:visited,
.waves-button-input {
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  border: none;
  outline: none;
  color: inherit;
  background-color: rgba(0, 0, 0, 0);
  font-size: 1em;
  line-height: 1em;
  text-align: center;
  text-decoration: none;
  z-index: 1;
}

.waves-button {
  padding: 0.85em 1.1em;
  border-radius: 0.2em;
}

.waves-button-input {
  margin: 0;
  padding: 0.85em 1.1em;
}

.waves-input-wrapper {
  border-radius: 0.2em;
  vertical-align: bottom;
}

.waves-input-wrapper.waves-button {
  padding: 0;
}

.waves-input-wrapper .waves-button-input {
  position: relative;
  top: 0;
  left: 0;
  z-index: 1;
}

.waves-circle {
  text-align: center;
  width: 2.5em;
  height: 2.5em;
  line-height: 2.5em;
  border-radius: 50%;
}

.waves-float {
  -webkit-mask-image: none;
  box-shadow: 0px 1px 1.5px 1px rgba(0, 0, 0, 0.12);
  transition: all 300ms;
}

.waves-float:active {
  box-shadow: 0px 8px 20px 1px rgba(0, 0, 0, 0.3);
}

.waves-block {
  display: block;
}

.waves-effect.waves-light .waves-ripple {
  background-color: rgba(255, 255, 255, 0.4);
}

.waves-effect.waves-primary .waves-ripple {
  background-color: rgba(114, 105, 239, 0.4);
}

.waves-effect.waves-success .waves-ripple {
  background-color: rgba(6, 214, 160, 0.4);
}

.waves-effect.waves-info .waves-ripple {
  background-color: rgba(80, 165, 241, 0.4);
}

.waves-effect.waves-warning .waves-ripple {
  background-color: rgba(255, 209, 102, 0.4);
}

.waves-effect.waves-danger .waves-ripple {
  background-color: rgba(239, 71, 111, 0.4);
}

.avatar-xs {
  height: 2.2rem;
  width: 2.2rem;
}

.avatar-sm {
  height: 3rem;
  width: 3rem;
}

.avatar-md {
  height: 4.5rem;
  width: 4.5rem;
}

.avatar-lg {
  height: 6rem;
  width: 6rem;
}

.avatar-xl {
  height: 7.5rem;
  width: 7.5rem;
}

.avatar-title {
  align-items: center;
  background-color: #7269ef;
  color: #fff;
  display: flex;
  font-weight: 500;
  height: 100%;
  justify-content: center;
  width: 100%;
}

.font-size-10 {
  font-size: 10px !important;
}

.font-size-11 {
  font-size: 11px !important;
}

.font-size-12 {
  font-size: 12px !important;
}

.font-size-13 {
  font-size: 13px !important;
}

.font-size-14 {
  font-size: 14px !important;
}

.font-size-15 {
  font-size: 15px !important;
}

.font-size-16 {
  font-size: 16px !important;
}

.font-size-17 {
  font-size: 17px !important;
}

.font-size-18 {
  font-size: 18px !important;
}

.font-size-20 {
  font-size: 20px !important;
}

.font-size-22 {
  font-size: 22px !important;
}

.font-size-24 {
  font-size: 24px !important;
}

.font-weight-medium {
  font-weight: 500;
}

.font-weight-semibold {
  font-weight: 600;
}

.social-list-item {
  height: 2rem;
  width: 2rem;
  line-height: calc(2rem - 4px);
  display: block;
  border: 2px solid #adb5bd;
  border-radius: 50%;
  color: #adb5bd;
  text-align: center;
  transition: all 0.4s;
}

.social-list-item:hover {
  color: #7a7f9a;
  background-color: #f5f7fb;
}

.w-xs {
  min-width: 80px;
}

.w-sm {
  min-width: 95px;
}

.w-md {
  min-width: 110px;
}

.w-lg {
  min-width: 140px;
}

.w-xl {
  min-width: 160px;
}

.custom-accordion .card + .card {
  margin-top: 0.5rem;
}

.custom-accordion a i.accor-plus-icon {
  font-size: 16px;
}

.custom-accordion a.collapsed i.accor-plus-icon:before {
  content: "\F0142";
}

.custom-checkbox-primary .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-primary .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #7269ef;
  border-color: #7269ef;
}

.custom-checkbox-secondary .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-secondary .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #7a7f9a;
  border-color: #7a7f9a;
}

.custom-checkbox-success .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-success .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #06D6A0;
  border-color: #06D6A0;
}

.custom-checkbox-info .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-info .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #50a5f1;
  border-color: #50a5f1;
}

.custom-checkbox-warning .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-warning .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #FFD166;
  border-color: #FFD166;
}

.custom-checkbox-danger .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-danger .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #EF476F;
  border-color: #EF476F;
}

.custom-checkbox-pink .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-pink .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #e83e8c;
  border-color: #e83e8c;
}

.custom-checkbox-light .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-light .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #e6ebf5;
  border-color: #e6ebf5;
}

.custom-checkbox-dark .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-dark .custom-control-input:checked ~ .custom-control-label:before {
  background-color: #343a40;
  border-color: #343a40;
}

.custom-checkbox-dark .custom-control-input:checked ~ .custom-control-label:before,
.custom-radio-dark .custom-control-input:checked ~ .custom-control-label:before {
  color: #343a40;
}

.custom-control-label {
  cursor: pointer;
}

.custom-switch-md {
  padding-left: 3rem;
}

.custom-switch-md .custom-control-label {
  line-height: 20px;
}

.custom-switch-md .custom-control-label:before {
  width: 40px;
  height: 20px;
  border-radius: 30px;
  left: -3rem;
}

.custom-switch-md .custom-control-label:after {
  width: calc(20px - 4px);
  height: calc(20px - 4px);
  left: calc(-3rem + 2px);
}

.custom-switch-md .custom-control-input:checked ~ .custom-control-label::after {
  transform: translateX(1.25rem);
}

.custom-switch-lg {
  padding-left: 3.75rem;
}

.custom-switch-lg .custom-control-label {
  line-height: 24px;
}

.custom-switch-lg .custom-control-label:before {
  width: 48px;
  height: 24px;
  border-radius: 30px;
  left: -3.75rem;
}

.custom-switch-lg .custom-control-label:after {
  width: calc(24px - 4px);
  height: calc(24px - 4px);
  left: calc(-3.75rem + 2px);
  border-radius: 50%;
}

.custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
  transform: translateX(1.5rem);
}

.custom-control-label::before {
  background-color: #fff;
}

[data-simplebar] {
  position: relative;
  flex-direction: column;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-content: flex-start;
  align-items: flex-start;
}

.simplebar-wrapper {
  overflow: hidden;
  width: inherit;
  height: inherit;
  max-width: inherit;
  max-height: inherit;
}

.simplebar-mask {
  direction: inherit;
  position: absolute;
  overflow: hidden;
  padding: 0;
  margin: 0;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  width: auto !important;
  height: auto !important;
  z-index: 0;
}

.simplebar-offset {
  direction: inherit !important;
  box-sizing: inherit !important;
  resize: none !important;
  position: absolute;
  top: 0;
  left: 0 !important;
  bottom: 0;
  right: 0 !important;
  padding: 0;
  margin: 0;
  -webkit-overflow-scrolling: touch;
}

.simplebar-content-wrapper {
  direction: inherit;
  box-sizing: border-box !important;
  position: relative;
  display: block;
  height: 100%;
  /* Required for horizontal native scrollbar to not appear if parent is taller than natural height */
  width: auto;
  visibility: visible;
  overflow: auto;
  /* Scroll on this element otherwise element can't have a padding applied properly */
  max-width: 100%;
  /* Not required for horizontal scroll to trigger */
  max-height: 100%;
  /* Needed for vertical scroll to trigger */
  scrollbar-width: none;
  padding: 0px !important;
}

.simplebar-content-wrapper::-webkit-scrollbar,
.simplebar-hide-scrollbar::-webkit-scrollbar {
  display: none;
}

.simplebar-content:before,
.simplebar-content:after {
  content: " ";
  display: table;
}

.simplebar-placeholder {
  max-height: 100%;
  max-width: 100%;
  width: 100%;
  pointer-events: none;
}

.simplebar-height-auto-observer-wrapper {
  box-sizing: inherit !important;
  height: 100%;
  width: 100%;
  max-width: 1px;
  position: relative;
  float: left;
  max-height: 1px;
  overflow: hidden;
  z-index: -1;
  padding: 0;
  margin: 0;
  pointer-events: none;
  flex-grow: inherit;
  flex-shrink: 0;
  flex-basis: 0;
}

.simplebar-height-auto-observer {
  box-sizing: inherit;
  display: block;
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  height: 1000%;
  width: 1000%;
  min-height: 1px;
  min-width: 1px;
  overflow: hidden;
  pointer-events: none;
  z-index: -1;
}

.simplebar-track {
  z-index: 1;
  position: absolute;
  right: 0;
  bottom: 0;
  pointer-events: none;
  overflow: hidden;
}

[data-simplebar].simplebar-dragging .simplebar-content {
  pointer-events: none;
  -moz-user-select: none;
   -ms-user-select: none;
       user-select: none;
  -webkit-user-select: none;
}

[data-simplebar].simplebar-dragging .simplebar-track {
  pointer-events: all;
}

.simplebar-scrollbar {
  position: absolute;
  right: 2px;
  width: 7px;
  min-height: 10px;
}

.simplebar-scrollbar:before {
  position: absolute;
  content: "";
  background: #a2adb7;
  border-radius: 7px;
  left: 0;
  right: 0;
  opacity: 0;
  transition: opacity 0.2s linear;
}

.simplebar-scrollbar.simplebar-visible:before {
  /* When hovered, remove all transitions from drag handle */
  opacity: 0.5;
  transition: opacity 0s linear;
}

.simplebar-track.simplebar-vertical {
  top: 0;
  width: 11px;
}

.simplebar-track.simplebar-vertical .simplebar-scrollbar:before {
  top: 2px;
  bottom: 2px;
}

.simplebar-track.simplebar-horizontal {
  left: 0;
  height: 11px;
}

.simplebar-track.simplebar-horizontal .simplebar-scrollbar:before {
  height: 100%;
  left: 2px;
  right: 2px;
}

.simplebar-track.simplebar-horizontal .simplebar-scrollbar {
  right: auto;
  left: 0;
  top: 2px;
  height: 7px;
  min-height: 0;
  min-width: 10px;
  width: auto;
}

/* Rtl support */

[data-simplebar-direction=rtl] .simplebar-track.simplebar-vertical {
  right: auto;
  left: 0;
}

.hs-dummy-scrollbar-size {
  direction: rtl;
  position: fixed;
  opacity: 0;
  visibility: hidden;
  height: 500px;
  width: 500px;
  overflow-y: hidden;
  overflow-x: scroll;
}

.simplebar-hide-scrollbar {
  position: fixed;
  left: 0;
  visibility: hidden;
  overflow-y: scroll;
  scrollbar-width: none;
}

.custom-scroll {
  height: 100%;
}

.side-menu {
  min-width: 75px;
  max-width: 75px;
  height: 100vh;
  min-height: 570px;
  background-color: #ffffff;
  display: flex;
  z-index: 9;
  box-shadow: 0 2px 4px rgba(15, 34, 58, 0.12);
}

@media (max-width: 991.98px) {
  .side-menu {
    position: fixed;
    bottom: 0;
    height: 60px;
    min-width: 100%;
    min-height: auto;
    display: block;
    border-top: 1px solid #f0eff5;
  }
}

.side-menu .navbar-brand-box {
  text-align: center;
}

@media (max-width: 991.98px) {
  .side-menu .navbar-brand-box {
    display: none;
  }
}

.side-menu .navbar-brand-box .logo {
  line-height: 70px;
}

.side-menu .navbar-brand-box .logo-dark {
  display: block;
}

.side-menu .navbar-brand-box .logo-light {
  display: none;
}

.side-menu .theme-mode-icon:before {
  content: "\EEFB";
}

.side-menu-nav .nav-item {
  margin: 7px 0;
}

@media (max-width: 991.98px) {
  .side-menu-nav .nav-item {
    flex-basis: 0;
    flex-grow: 1;
    margin: 5px 0;
  }
}

.side-menu-nav .nav-item .nav-link {
  text-align: center;
  font-size: 24px;
  color: #878a92;
  width: 56px;
  height: 56px;
  line-height: 56px;
  margin: 0px auto;
  border-radius: 8px;
  padding: 0;
}

@media (max-width: 991.98px) {
  .side-menu-nav .nav-item .nav-link {
    font-size: 20px;
    width: 48px;
    height: 48px;
    line-height: 48px;
  }
}

.side-menu-nav .nav-item .nav-link.active {
  background-color: #f7f7ff;
  color: #7269ef;
}

.side-menu-nav .nav-item.show > .nav-link {
  background-color: #f7f7ff;
  color: #7269ef;
}

.side-menu-nav .profile-user {
  height: 36px;
  width: 36px;
  background-color: #f0eff5;
  padding: 3px;
}

.chat-leftsidebar {
  height: 100vh;
  background-color: #f5f7fb;
}

@media (min-width: 992px) {
  .chat-leftsidebar {
    min-width: 380px;
    max-width: 380px;
  }
}

.chat-leftsidebar .user-status-box {
  background-color: #e6ebf5;
  padding: 8px;
  border-radius: 8px;
  text-align: center;
  margin-top: 16px;
  display: block;
}

.chat-leftsidebar .user-status-box .chat-user-img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}

.chat-search-box .form-control {
  border: 0;
}

.chat-search-box .search-icon-btn {
  font-size: 16px;
  position: absolute;
  right: 13px;
  top: 0;
}

.chat-message-list {
  height: calc(100vh - 280px);
}

@media (max-width: 991.98px) {
  .chat-message-list {
    height: calc(100vh - 320px);
  }
}

.chat-group-list {
  height: calc(100vh - 160px);
}

@media (max-width: 991.98px) {
  .chat-group-list {
    height: calc(100vh - 194px);
  }
}

.chat-list {
  margin: 0;
}

.chat-list li.active a {
  background-color: #e6ebf5;
}

.chat-list li a {
  position: relative;
  display: block;
  padding: 15px 20px;
  color: #7a7f9a;
  transition: all 0.4s;
  border-top: 1px solid #f5f7fb;
  border-radius: 4px;
}

.chat-list li a:hover {
  background-color: #e6ebf5;
}

.chat-list li .chat-user-message {
  font-size: 14px;
}

.chat-list li.typing .chat-user-message {
  color: #7269ef;
  font-weight: 500;
}

.chat-list li.typing .chat-user-message .dot {
  background-color: #7269ef;
}

.chat-list li .unread-message {
  position: absolute;
  display: inline-block;
  right: 24px;
  top: 33px;
}

.chat-list li .unread-message .badge {
  line-height: 16px;
  font-weight: 600;
  font-size: 10px;
}

.chat-user-img {
  position: relative;
}

.chat-user-img .user-status {
  width: 10px;
  height: 10px;
  background-color: #adb5bd;
  border-radius: 50%;
  border: 2px solid #fff;
  position: absolute;
  right: 0;
  bottom: 0;
}

.chat-user-img.online .user-status {
  background-color: #06D6A0;
}

.chat-user-img.away .user-status {
  background-color: #FFD166;
}

.contact-list li {
  cursor: pointer;
}

.contact-list li h5 {
  padding: 10px 20px;
}

.profile-user {
  position: relative;
  display: inline-block;
}

.profile-user .profile-photo-edit {
  position: absolute;
  right: 0;
  bottom: 0;
}

.user-chat {
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(15, 34, 58, 0.12);
  transition: all 0.4s;
}

@media (max-width: 991.98px) {
  .user-chat {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    visibility: hidden;
    transform: translateX(100%);
    z-index: 99;
  }

  .user-chat.user-chat-show {
    visibility: visible;
    transform: translateX(0);
  }
}

.user-chat-nav .nav-btn {
  height: 40px;
  width: 40px;
  line-height: 40px;
  box-shadow: none;
  padding: 0;
  font-size: 20px;
  color: #7a7f9a;
}

.chat-conversation li {
  clear: both;
}

.chat-conversation .chat-avatar {
  margin-right: 16px;
}

.chat-conversation .chat-avatar img {
  width: 36px;
  height: 36px;
  border-radius: 50%;
}

.chat-conversation .chat-day-title {
  position: relative;
  text-align: center;
  margin-bottom: 24px;
  margin-top: 12px;
}

.chat-conversation .chat-day-title .title {
  background-color: #f0eff5;
  position: relative;
  font-size: 13px;
  z-index: 1;
  padding: 6px 12px;
  border-radius: 5px;
}

.chat-conversation .chat-day-title:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 1px;
  left: 0;
  right: 0;
  background-color: #f0eff5;
  top: 10px;
}

.chat-conversation .chat-day-title .badge {
  font-size: 12px;
}

.chat-conversation .conversation-list {
  margin-bottom: 24px;
  display: inline-flex;
  position: relative;
  align-items: flex-end;
}

.chat-conversation .conversation-list .ctext-wrap {
  display: flex;
  margin-bottom: 10px;
}

.chat-conversation .conversation-list .ctext-wrap-content {
  padding: 12px 20px;
  background-color: #7269ef;
  border-radius: 8px 8px 8px 0;
  color: #fff;
  position: relative;
}

.chat-conversation .conversation-list .ctext-wrap-content:before {
  content: "";
  position: absolute;
  border: 5px solid transparent;
  border-left-color: #7269ef;
  border-top-color: #7269ef;
  left: 0;
  bottom: -10px;
}

.chat-conversation .conversation-list .conversation-name {
  font-weight: 500;
  font-size: 14px;
}

.chat-conversation .conversation-list .dropdown .dropdown-toggle {
  font-size: 18px;
  padding: 4px;
  color: #7a7f9a;
}

@media (max-width: 575.98px) {
  .chat-conversation .conversation-list .dropdown .dropdown-toggle {
    display: none;
  }
}

.chat-conversation .conversation-list .chat-time {
  font-size: 12px;
  margin-top: 4px;
  text-align: right;
  color: rgba(255, 255, 255, 0.5);
}

.chat-conversation .conversation-list .message-img {
  border-radius: 0.2rem;
  position: relative;
}

.chat-conversation .conversation-list .message-img .message-img-list {
  position: relative;
}

.chat-conversation .conversation-list .message-img img {
  max-width: 150px;
}

.chat-conversation .conversation-list .message-img .message-img-link {
  position: absolute;
  right: 10px;
  bottom: 10px;
}

.chat-conversation .conversation-list .message-img .message-img-link li > a {
  font-size: 18px;
  color: #fff;
  display: inline-block;
  line-height: 30px;
  width: 30px;
  height: 30px;
  text-align: center;
}

.chat-conversation .right .chat-avatar {
  order: 3;
  margin-right: 0px;
  margin-left: 16px;
}

.chat-conversation .right .chat-time {
  text-align: left;
  color: #7a7f9a;
}

.chat-conversation .right .conversation-list {
  float: right;
  text-align: right;
}

.chat-conversation .right .conversation-list .ctext-wrap .ctext-wrap-content {
  order: 2;
  background-color: #f5f7fb;
  color: #343a40;
  text-align: right;
  border-radius: 8px 8px 0px 8px;
}

.chat-conversation .right .conversation-list .ctext-wrap .ctext-wrap-content:before {
  border: 5px solid transparent;
  border-top-color: #f5f7fb;
  border-right-color: #f5f7fb;
  left: auto;
  right: 0px;
}

.chat-conversation .right .conversation-list .dropdown {
  order: 1;
}

.chat-conversation .right .dot {
  background-color: #343a40;
}

.chat-conversation {
  height: calc(100vh - 184px);
}

@media (max-width: 991.98px) {
  .chat-conversation {
    height: calc(100vh - 152px);
  }
}

.chat-input-links .list-inline-item:not(:last-child) {
  margin: 0;
}

.animate-typing .dot {
  display: inline-block;
  width: 4px;
  height: 4px;
  border-radius: 50%;
  margin-right: -1px;
  background: #fff;
  -webkit-animation: wave 1.3s linear infinite;
          animation: wave 1.3s linear infinite;
  opacity: 0.6;
}

.animate-typing .dot:nth-child(2) {
  -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
}

.animate-typing .dot:nth-child(3) {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
}

@-webkit-keyframes wave {
  0%, 60%, 100% {
    transform: initial;
  }

  30% {
    transform: translateY(-5px);
  }
}

@keyframes wave {
  0%, 60%, 100% {
    transform: initial;
  }

  30% {
    transform: translateY(-5px);
  }
}

.user-profile-sidebar {
  height: 100vh;
  background-color: #fff;
  border-left: 1px solid #e6ebf4;
  display: none;
  min-width: 380px;
  max-width: 380px;
}

@media (min-width: 992px) {
  .user-profile-sidebar {
    border-left: 4px solid #f0eff5;
  }
}

@media (max-width: 1199.98px) {
  .user-profile-sidebar {
    position: fixed;
    right: 0;
    top: 0;
    z-index: 99;
  }
}

@media (max-width: 575.98px) {
  .user-profile-sidebar {
    min-width: 100%;
  }
}

.user-profile-desc {
  height: calc(100vh - 300px);
}

@media (max-width: 991.98px) {
  .user-profile-desc {
    height: calc(100vh - 324px);
  }
}

.auth-logo .logo {
  margin: 0px auto;
}

.auth-logo .logo-dark {
  display: block;
}

.auth-logo .logo-light {
  display: none;
}

</style>