<style>
@import "https://fonts.googleapis.com/css?family=Raleway:400,300,200,500,600,700";
.fa-spin-fast {
  -webkit-animation: fa-spin-fast 0.2s infinite linear;
  animation: fa-spin-fast 0.2s infinite linear;
}
@-webkit-keyframes fa-spin-fast {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
@keyframes fa-spin-fast {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
.material-card {
  position: relative;
  height: 0;
  padding-bottom: calc(100% - 16px);
  margin-bottom: 6.6em;
}
.material-card h2 {
  position: absolute;
  top: calc(100% - 16px);
  left: 0;
  width: 100%;
  padding: 10px 16px;
  color: #fff;
  font-size: 1.4em;
  line-height: 1.6em;
  margin: 0;
  z-index: 10;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}
.material-card h2 span {
  display: block;
}
.material-card h2 strong {
  font-weight: 400;
  display: block;
  font-size: 0.8em;
}
.material-card h2:before,
.material-card h2:after {
  content: ' ';
  position: absolute;
  left: 0;
  top: -16px;
  width: 0;
  border: 8px solid;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}
.material-card h2:after {
  top: auto;
  bottom: 0;
}
@media screen and (max-width: 767px) {
  .material-card.mc-active {
    padding-bottom: 0;
    height: auto;
  }
}
.material-card.mc-active h2 {
  top: 0;
  padding: 10px 16px 10px 90px;
}
.material-card.mc-active h2:before {
  top: 0;
}
.material-card.mc-active h2:after {
  bottom: -16px;
}
.material-card .mc-content {
  position: absolute;
  right: 0;
  top: 0;
  bottom: 16px;
  left: 16px;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}
.material-card .mc-btn-action {
  position: absolute;
  right: 16px;
  top: 15px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 5px solid;
  width: 54px;
  height: 54px;
  line-height: 44px;
  text-align: center;
  color: #fff;
  cursor: pointer;
  z-index: 20;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}
.material-card.mc-active .mc-btn-action {
  top: 62px;
}
.material-card .mc-description {
  position: absolute;
  top: 100%;
  right: 30px;
  left: 30px;
  bottom: 54px;
  overflow: hidden;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: all 1.2s;
  -moz-transition: all 1.2s;
  -ms-transition: all 1.2s;
  -o-transition: all 1.2s;
  transition: all 1.2s;
}
.material-card .mc-footer {
  height: 0;
  overflow: hidden;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}
.material-card .mc-footer h4 {
  position: absolute;
  top: 200px;
  left: 30px;
  padding: 0;
  margin: 0;
  font-size: 16px;
  font-weight: 700;
  -webkit-transition: all 1.4s;
  -moz-transition: all 1.4s;
  -ms-transition: all 1.4s;
  -o-transition: all 1.4s;
  transition: all 1.4s;
}
.material-card .mc-footer a {
  display: block;
  float: left;
  position: relative;
  width: 52px;
  height: 52px;
  margin-left: 5px;
  margin-bottom: 15px;
  font-size: 28px;
  color: #fff;
  line-height: 52px;
  text-decoration: none;
  top: 200px;
}
.material-card .mc-footer a:nth-child(1) {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -ms-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
.material-card .mc-footer a:nth-child(2) {
  -webkit-transition: all 0.6s;
  -moz-transition: all 0.6s;
  -ms-transition: all 0.6s;
  -o-transition: all 0.6s;
  transition: all 0.6s;
}
.material-card .mc-footer a:nth-child(3) {
  -webkit-transition: all 0.7s;
  -moz-transition: all 0.7s;
  -ms-transition: all 0.7s;
  -o-transition: all 0.7s;
  transition: all 0.7s;
}
.material-card .mc-footer a:nth-child(4) {
  -webkit-transition: all 0.8s;
  -moz-transition: all 0.8s;
  -ms-transition: all 0.8s;
  -o-transition: all 0.8s;
  transition: all 0.8s;
}
.material-card .mc-footer a:nth-child(5) {
  -webkit-transition: all 0.9s;
  -moz-transition: all 0.9s;
  -ms-transition: all 0.9s;
  -o-transition: all 0.9s;
  transition: all 0.9s;
}
.material-card .img-container {
  overflow: hidden;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 3;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}
.material-card.mc-active .img-container {
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  left: 0;
  top: 12px;
  width: 60px;
  height: 60px;
  z-index: 20;
}
.material-card.mc-active .mc-content {
  padding-top: 5.6em;
}
@media screen and (max-width: 767px) {
  .material-card.mc-active .mc-content {
    position: relative;
    margin-right: 16px;
  }
}
.material-card.mc-active .mc-description {
  top: 50px;
  padding-top: 5.6em;
  opacity: 1;
  filter: alpha(opacity=100);
}
@media screen and (max-width: 767px) {
  .material-card.mc-active .mc-description {
    position: relative;
    top: auto;
    right: auto;
    left: auto;
    padding: 50px 30px 70px 30px;
    bottom: 0;
  }
}
.material-card.mc-active .mc-footer {
  overflow: visible;
  position: absolute;
  top: calc(100% - 16px);
  left: 16px;
  right: 0;
  height: 82px;
  padding-top: 15px;
  padding-left: 25px;
}
.material-card.mc-active .mc-footer a {
  top: 0;
}
.material-card.mc-active .mc-footer h4 {
  top: -32px;
}
.material-card.Red h2 {
  background-color: #F44336;
}
.material-card.Red h2:after {
  border-top-color: #F44336;
  border-right-color: #F44336;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Red h2:before {
  border-top-color: transparent;
  border-right-color: #B71C1C;
  border-bottom-color: #B71C1C;
  border-left-color: transparent;
}
.material-card.Red.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #F44336;
  border-bottom-color: #F44336;
  border-left-color: transparent;
}
.material-card.Red.mc-active h2:after {
  border-top-color: #B71C1C;
  border-right-color: #B71C1C;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Red .mc-btn-action {
  background-color: #F44336;
}
.material-card.Red .mc-btn-action:hover {
  background-color: #B71C1C;
}
.material-card.Red .mc-footer h4 {
  color: #B71C1C;
}
.material-card.Red .mc-footer a {
  background-color: #B71C1C;
}
.material-card.Red.mc-active .mc-content {
  background-color: #FFEBEE;
}
.material-card.Red.mc-active .mc-footer {
  background-color: #FFCDD2;
}
.material-card.Red.mc-active .mc-btn-action {
  border-color: #FFEBEE;
}
.material-card.Blue-Grey h2 {
  background-color: #607D8B;
}
.material-card.Blue-Grey h2:after {
  border-top-color: #607D8B;
  border-right-color: #607D8B;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Blue-Grey h2:before {
  border-top-color: transparent;
  border-right-color: #263238;
  border-bottom-color: #263238;
  border-left-color: transparent;
}
.material-card.Blue-Grey.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #607D8B;
  border-bottom-color: #607D8B;
  border-left-color: transparent;
}
.material-card.Blue-Grey.mc-active h2:after {
  border-top-color: #263238;
  border-right-color: #263238;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Blue-Grey .mc-btn-action {
  background-color: #607D8B;
}
.material-card.Blue-Grey .mc-btn-action:hover {
  background-color: #263238;
}
.material-card.Blue-Grey .mc-footer h4 {
  color: #263238;
}
.material-card.Blue-Grey .mc-footer a {
  background-color: #263238;
}
.material-card.Blue-Grey.mc-active .mc-content {
  background-color: #ECEFF1;
}
.material-card.Blue-Grey.mc-active .mc-footer {
  background-color: #CFD8DC;
}
.material-card.Blue-Grey.mc-active .mc-btn-action {
  border-color: #ECEFF1;
}
.material-card.Pink h2 {
  background-color: #E91E63;
}
.material-card.Pink h2:after {
  border-top-color: #E91E63;
  border-right-color: #E91E63;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Pink h2:before {
  border-top-color: transparent;
  border-right-color: #880E4F;
  border-bottom-color: #880E4F;
  border-left-color: transparent;
}
.material-card.Pink.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #E91E63;
  border-bottom-color: #E91E63;
  border-left-color: transparent;
}
.material-card.Pink.mc-active h2:after {
  border-top-color: #880E4F;
  border-right-color: #880E4F;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Pink .mc-btn-action {
  background-color: #E91E63;
}
.material-card.Pink .mc-btn-action:hover {
  background-color: #880E4F;
}
.material-card.Pink .mc-footer h4 {
  color: #880E4F;
}
.material-card.Pink .mc-footer a {
  background-color: #880E4F;
}
.material-card.Pink.mc-active .mc-content {
  background-color: #FCE4EC;
}
.material-card.Pink.mc-active .mc-footer {
  background-color: #F8BBD0;
}
.material-card.Pink.mc-active .mc-btn-action {
  border-color: #FCE4EC;
}
.material-card.Purple h2 {
  background-color: #9C27B0;
}
.material-card.Purple h2:after {
  border-top-color: #9C27B0;
  border-right-color: #9C27B0;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Purple h2:before {
  border-top-color: transparent;
  border-right-color: #4A148C;
  border-bottom-color: #4A148C;
  border-left-color: transparent;
}
.material-card.Purple.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #9C27B0;
  border-bottom-color: #9C27B0;
  border-left-color: transparent;
}
.material-card.Purple.mc-active h2:after {
  border-top-color: #4A148C;
  border-right-color: #4A148C;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Purple .mc-btn-action {
  background-color: #9C27B0;
}
.material-card.Purple .mc-btn-action:hover {
  background-color: #4A148C;
}
.material-card.Purple .mc-footer h4 {
  color: #4A148C;
}
.material-card.Purple .mc-footer a {
  background-color: #4A148C;
}
.material-card.Purple.mc-active .mc-content {
  background-color: #F3E5F5;
}
.material-card.Purple.mc-active .mc-footer {
  background-color: #E1BEE7;
}
.material-card.Purple.mc-active .mc-btn-action {
  border-color: #F3E5F5;
}
.material-card.Deep-Purple h2 {
  background-color: #673AB7;
}
.material-card.Deep-Purple h2:after {
  border-top-color: #673AB7;
  border-right-color: #673AB7;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Deep-Purple h2:before {
  border-top-color: transparent;
  border-right-color: #311B92;
  border-bottom-color: #311B92;
  border-left-color: transparent;
}
.material-card.Deep-Purple.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #673AB7;
  border-bottom-color: #673AB7;
  border-left-color: transparent;
}
.material-card.Deep-Purple.mc-active h2:after {
  border-top-color: #311B92;
  border-right-color: #311B92;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Deep-Purple .mc-btn-action {
  background-color: #673AB7;
}
.material-card.Deep-Purple .mc-btn-action:hover {
  background-color: #311B92;
}
.material-card.Deep-Purple .mc-footer h4 {
  color: #311B92;
}
.material-card.Deep-Purple .mc-footer a {
  background-color: #311B92;
}
.material-card.Deep-Purple.mc-active .mc-content {
  background-color: #EDE7F6;
}
.material-card.Deep-Purple.mc-active .mc-footer {
  background-color: #D1C4E9;
}
.material-card.Deep-Purple.mc-active .mc-btn-action {
  border-color: #EDE7F6;
}
.material-card.Indigo h2 {
  background-color: #3F51B5;
}
.material-card.Indigo h2:after {
  border-top-color: #3F51B5;
  border-right-color: #3F51B5;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Indigo h2:before {
  border-top-color: transparent;
  border-right-color: #1A237E;
  border-bottom-color: #1A237E;
  border-left-color: transparent;
}
.material-card.Indigo.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #3F51B5;
  border-bottom-color: #3F51B5;
  border-left-color: transparent;
}
.material-card.Indigo.mc-active h2:after {
  border-top-color: #1A237E;
  border-right-color: #1A237E;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Indigo .mc-btn-action {
  background-color: #3F51B5;
}
.material-card.Indigo .mc-btn-action:hover {
  background-color: #1A237E;
}
.material-card.Indigo .mc-footer h4 {
  color: #1A237E;
}
.material-card.Indigo .mc-footer a {
  background-color: #1A237E;
}
.material-card.Indigo.mc-active .mc-content {
  background-color: #E8EAF6;
}
.material-card.Indigo.mc-active .mc-footer {
  background-color: #C5CAE9;
}
.material-card.Indigo.mc-active .mc-btn-action {
  border-color: #E8EAF6;
}
.material-card.Blue h2 {
  background-color: #2196F3;
}
.material-card.Blue h2:after {
  border-top-color: #2196F3;
  border-right-color: #2196F3;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Blue h2:before {
  border-top-color: transparent;
  border-right-color: #0D47A1;
  border-bottom-color: #0D47A1;
  border-left-color: transparent;
}
.material-card.Blue.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #2196F3;
  border-bottom-color: #2196F3;
  border-left-color: transparent;
}
.material-card.Blue.mc-active h2:after {
  border-top-color: #0D47A1;
  border-right-color: #0D47A1;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Blue .mc-btn-action {
  background-color: #2196F3;
}
.material-card.Blue .mc-btn-action:hover {
  background-color: #0D47A1;
}
.material-card.Blue .mc-footer h4 {
  color: #0D47A1;
}
.material-card.Blue .mc-footer a {
  background-color: #0D47A1;
}
.material-card.Blue.mc-active .mc-content {
  background-color: #E3F2FD;
}
.material-card.Blue.mc-active .mc-footer {
  background-color: #BBDEFB;
}
.material-card.Blue.mc-active .mc-btn-action {
  border-color: #E3F2FD;
}
.material-card.Light-Blue h2 {
  background-color: #03A9F4;
}
.material-card.Light-Blue h2:after {
  border-top-color: #03A9F4;
  border-right-color: #03A9F4;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Light-Blue h2:before {
  border-top-color: transparent;
  border-right-color: #01579B;
  border-bottom-color: #01579B;
  border-left-color: transparent;
}
.material-card.Light-Blue.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #03A9F4;
  border-bottom-color: #03A9F4;
  border-left-color: transparent;
}
.material-card.Light-Blue.mc-active h2:after {
  border-top-color: #01579B;
  border-right-color: #01579B;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Light-Blue .mc-btn-action {
  background-color: #03A9F4;
}
.material-card.Light-Blue .mc-btn-action:hover {
  background-color: #01579B;
}
.material-card.Light-Blue .mc-footer h4 {
  color: #01579B;
}
.material-card.Light-Blue .mc-footer a {
  background-color: #01579B;
}
.material-card.Light-Blue.mc-active .mc-content {
  background-color: #E1F5FE;
}
.material-card.Light-Blue.mc-active .mc-footer {
  background-color: #B3E5FC;
}
.material-card.Light-Blue.mc-active .mc-btn-action {
  border-color: #E1F5FE;
}
.material-card.Cyan h2 {
  background-color: #00BCD4;
}
.material-card.Cyan h2:after {
  border-top-color: #00BCD4;
  border-right-color: #00BCD4;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Cyan h2:before {
  border-top-color: transparent;
  border-right-color: #006064;
  border-bottom-color: #006064;
  border-left-color: transparent;
}
.material-card.Cyan.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #00BCD4;
  border-bottom-color: #00BCD4;
  border-left-color: transparent;
}
.material-card.Cyan.mc-active h2:after {
  border-top-color: #006064;
  border-right-color: #006064;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Cyan .mc-btn-action {
  background-color: #00BCD4;
}
.material-card.Cyan .mc-btn-action:hover {
  background-color: #006064;
}
.material-card.Cyan .mc-footer h4 {
  color: #006064;
}
.material-card.Cyan .mc-footer a {
  background-color: #006064;
}
.material-card.Cyan.mc-active .mc-content {
  background-color: #E0F7FA;
}
.material-card.Cyan.mc-active .mc-footer {
  background-color: #B2EBF2;
}
.material-card.Cyan.mc-active .mc-btn-action {
  border-color: #E0F7FA;
}
.material-card.Teal h2 {
  background-color: #009688;
}
.material-card.Teal h2:after {
  border-top-color: #009688;
  border-right-color: #009688;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Teal h2:before {
  border-top-color: transparent;
  border-right-color: #004D40;
  border-bottom-color: #004D40;
  border-left-color: transparent;
}
.material-card.Teal.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #009688;
  border-bottom-color: #009688;
  border-left-color: transparent;
}
.material-card.Teal.mc-active h2:after {
  border-top-color: #004D40;
  border-right-color: #004D40;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Teal .mc-btn-action {
  background-color: #009688;
}
.material-card.Teal .mc-btn-action:hover {
  background-color: #004D40;
}
.material-card.Teal .mc-footer h4 {
  color: #004D40;
}
.material-card.Teal .mc-footer a {
  background-color: #004D40;
}
.material-card.Teal.mc-active .mc-content {
  background-color: #E0F2F1;
}
.material-card.Teal.mc-active .mc-footer {
  background-color: #B2DFDB;
}
.material-card.Teal.mc-active .mc-btn-action {
  border-color: #E0F2F1;
}
.material-card.Green h2 {
  background-color: #4CAF50;
}
.material-card.Green h2:after {
  border-top-color: #4CAF50;
  border-right-color: #4CAF50;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Green h2:before {
  border-top-color: transparent;
  border-right-color: #1B5E20;
  border-bottom-color: #1B5E20;
  border-left-color: transparent;
}
.material-card.Green.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #4CAF50;
  border-bottom-color: #4CAF50;
  border-left-color: transparent;
}
.material-card.Green.mc-active h2:after {
  border-top-color: #1B5E20;
  border-right-color: #1B5E20;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Green .mc-btn-action {
  background-color: #4CAF50;
}
.material-card.Green .mc-btn-action:hover {
  background-color: #1B5E20;
}
.material-card.Green .mc-footer h4 {
  color: #1B5E20;
}
.material-card.Green .mc-footer a {
  background-color: #1B5E20;
}
.material-card.Green.mc-active .mc-content {
  background-color: #E8F5E9;
}
.material-card.Green.mc-active .mc-footer {
  background-color: #C8E6C9;
}
.material-card.Green.mc-active .mc-btn-action {
  border-color: #E8F5E9;
}
.material-card.Light-Green h2 {
  background-color: #8BC34A;
}
.material-card.Light-Green h2:after {
  border-top-color: #8BC34A;
  border-right-color: #8BC34A;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Light-Green h2:before {
  border-top-color: transparent;
  border-right-color: #33691E;
  border-bottom-color: #33691E;
  border-left-color: transparent;
}
.material-card.Light-Green.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #8BC34A;
  border-bottom-color: #8BC34A;
  border-left-color: transparent;
}
.material-card.Light-Green.mc-active h2:after {
  border-top-color: #33691E;
  border-right-color: #33691E;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Light-Green .mc-btn-action {
  background-color: #8BC34A;
}
.material-card.Light-Green .mc-btn-action:hover {
  background-color: #33691E;
}
.material-card.Light-Green .mc-footer h4 {
  color: #33691E;
}
.material-card.Light-Green .mc-footer a {
  background-color: #33691E;
}
.material-card.Light-Green.mc-active .mc-content {
  background-color: #F1F8E9;
}
.material-card.Light-Green.mc-active .mc-footer {
  background-color: #DCEDC8;
}
.material-card.Light-Green.mc-active .mc-btn-action {
  border-color: #F1F8E9;
}
.material-card.Lime h2 {
  background-color: #CDDC39;
}
.material-card.Lime h2:after {
  border-top-color: #CDDC39;
  border-right-color: #CDDC39;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Lime h2:before {
  border-top-color: transparent;
  border-right-color: #827717;
  border-bottom-color: #827717;
  border-left-color: transparent;
}
.material-card.Lime.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #CDDC39;
  border-bottom-color: #CDDC39;
  border-left-color: transparent;
}
.material-card.Lime.mc-active h2:after {
  border-top-color: #827717;
  border-right-color: #827717;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Lime .mc-btn-action {
  background-color: #CDDC39;
}
.material-card.Lime .mc-btn-action:hover {
  background-color: #827717;
}
.material-card.Lime .mc-footer h4 {
  color: #827717;
}
.material-card.Lime .mc-footer a {
  background-color: #827717;
}
.material-card.Lime.mc-active .mc-content {
  background-color: #F9FBE7;
}
.material-card.Lime.mc-active .mc-footer {
  background-color: #F0F4C3;
}
.material-card.Lime.mc-active .mc-btn-action {
  border-color: #F9FBE7;
}
.material-card.Yellow h2 {
  background-color: #FFEB3B;
}
.material-card.Yellow h2:after {
  border-top-color: #FFEB3B;
  border-right-color: #FFEB3B;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Yellow h2:before {
  border-top-color: transparent;
  border-right-color: #F57F17;
  border-bottom-color: #F57F17;
  border-left-color: transparent;
}
.material-card.Yellow.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #FFEB3B;
  border-bottom-color: #FFEB3B;
  border-left-color: transparent;
}
.material-card.Yellow.mc-active h2:after {
  border-top-color: #F57F17;
  border-right-color: #F57F17;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Yellow .mc-btn-action {
  background-color: #FFEB3B;
}
.material-card.Yellow .mc-btn-action:hover {
  background-color: #F57F17;
}
.material-card.Yellow .mc-footer h4 {
  color: #F57F17;
}
.material-card.Yellow .mc-footer a {
  background-color: #F57F17;
}
.material-card.Yellow.mc-active .mc-content {
  background-color: #FFFDE7;
}
.material-card.Yellow.mc-active .mc-footer {
  background-color: #FFF9C4;
}
.material-card.Yellow.mc-active .mc-btn-action {
  border-color: #FFFDE7;
}
.material-card.Amber h2 {
  background-color: #FFC107;
}
.material-card.Amber h2:after {
  border-top-color: #FFC107;
  border-right-color: #FFC107;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Amber h2:before {
  border-top-color: transparent;
  border-right-color: #FF6F00;
  border-bottom-color: #FF6F00;
  border-left-color: transparent;
}
.material-card.Amber.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #FFC107;
  border-bottom-color: #FFC107;
  border-left-color: transparent;
}
.material-card.Amber.mc-active h2:after {
  border-top-color: #FF6F00;
  border-right-color: #FF6F00;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Amber .mc-btn-action {
  background-color: #FFC107;
}
.material-card.Amber .mc-btn-action:hover {
  background-color: #FF6F00;
}
.material-card.Amber .mc-footer h4 {
  color: #FF6F00;
}
.material-card.Amber .mc-footer a {
  background-color: #FF6F00;
}
.material-card.Amber.mc-active .mc-content {
  background-color: #FFF8E1;
}
.material-card.Amber.mc-active .mc-footer {
  background-color: #FFECB3;
}
.material-card.Amber.mc-active .mc-btn-action {
  border-color: #FFF8E1;
}
.material-card.Orange h2 {
  background-color: #FF9800;
}
.material-card.Orange h2:after {
  border-top-color: #FF9800;
  border-right-color: #FF9800;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Orange h2:before {
  border-top-color: transparent;
  border-right-color: #E65100;
  border-bottom-color: #E65100;
  border-left-color: transparent;
}
.material-card.Orange.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #FF9800;
  border-bottom-color: #FF9800;
  border-left-color: transparent;
}
.material-card.Orange.mc-active h2:after {
  border-top-color: #E65100;
  border-right-color: #E65100;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Orange .mc-btn-action {
  background-color: #FF9800;
}
.material-card.Orange .mc-btn-action:hover {
  background-color: #E65100;
}
.material-card.Orange .mc-footer h4 {
  color: #E65100;
}
.material-card.Orange .mc-footer a {
  background-color: #E65100;
}
.material-card.Orange.mc-active .mc-content {
  background-color: #FFF3E0;
}
.material-card.Orange.mc-active .mc-footer {
  background-color: #FFE0B2;
}
.material-card.Orange.mc-active .mc-btn-action {
  border-color: #FFF3E0;
}
.material-card.Deep-Orange h2 {
  background-color: #FF5722;
}
.material-card.Deep-Orange h2:after {
  border-top-color: #FF5722;
  border-right-color: #FF5722;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Deep-Orange h2:before {
  border-top-color: transparent;
  border-right-color: #BF360C;
  border-bottom-color: #BF360C;
  border-left-color: transparent;
}
.material-card.Deep-Orange.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #FF5722;
  border-bottom-color: #FF5722;
  border-left-color: transparent;
}
.material-card.Deep-Orange.mc-active h2:after {
  border-top-color: #BF360C;
  border-right-color: #BF360C;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Deep-Orange .mc-btn-action {
  background-color: #FF5722;
}
.material-card.Deep-Orange .mc-btn-action:hover {
  background-color: #BF360C;
}
.material-card.Deep-Orange .mc-footer h4 {
  color: #BF360C;
}
.material-card.Deep-Orange .mc-footer a {
  background-color: #BF360C;
}
.material-card.Deep-Orange.mc-active .mc-content {
  background-color: #FBE9E7;
}
.material-card.Deep-Orange.mc-active .mc-footer {
  background-color: #FFCCBC;
}
.material-card.Deep-Orange.mc-active .mc-btn-action {
  border-color: #FBE9E7;
}
.material-card.Brown h2 {
  background-color: #795548;
}
.material-card.Brown h2:after {
  border-top-color: #795548;
  border-right-color: #795548;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Brown h2:before {
  border-top-color: transparent;
  border-right-color: #3E2723;
  border-bottom-color: #3E2723;
  border-left-color: transparent;
}
.material-card.Brown.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #795548;
  border-bottom-color: #795548;
  border-left-color: transparent;
}
.material-card.Brown.mc-active h2:after {
  border-top-color: #3E2723;
  border-right-color: #3E2723;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Brown .mc-btn-action {
  background-color: #795548;
}
.material-card.Brown .mc-btn-action:hover {
  background-color: #3E2723;
}
.material-card.Brown .mc-footer h4 {
  color: #3E2723;
}
.material-card.Brown .mc-footer a {
  background-color: #3E2723;
}
.material-card.Brown.mc-active .mc-content {
  background-color: #EFEBE9;
}
.material-card.Brown.mc-active .mc-footer {
  background-color: #D7CCC8;
}
.material-card.Brown.mc-active .mc-btn-action {
  border-color: #EFEBE9;
}
.material-card.Grey h2 {
  background-color: #9E9E9E;
}
.material-card.Grey h2:after {
  border-top-color: #9E9E9E;
  border-right-color: #9E9E9E;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Grey h2:before {
  border-top-color: transparent;
  border-right-color: #212121;
  border-bottom-color: #212121;
  border-left-color: transparent;
}
.material-card.Grey.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #9E9E9E;
  border-bottom-color: #9E9E9E;
  border-left-color: transparent;
}
.material-card.Grey.mc-active h2:after {
  border-top-color: #212121;
  border-right-color: #212121;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Grey .mc-btn-action {
  background-color: #9E9E9E;
}
.material-card.Grey .mc-btn-action:hover {
  background-color: #212121;
}
.material-card.Grey .mc-footer h4 {
  color: #212121;
}
.material-card.Grey .mc-footer a {
  background-color: #212121;
}
.material-card.Grey.mc-active .mc-content {
  background-color: #FAFAFA;
}
.material-card.Grey.mc-active .mc-footer {
  background-color: #F5F5F5;
}
.material-card.Grey.mc-active .mc-btn-action {
  border-color: #FAFAFA;
}
.material-card.Blue-Grey h2 {
  background-color: #607D8B;
}
.material-card.Blue-Grey h2:after {
  border-top-color: #607D8B;
  border-right-color: #607D8B;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Blue-Grey h2:before {
  border-top-color: transparent;
  border-right-color: #263238;
  border-bottom-color: #263238;
  border-left-color: transparent;
}
.material-card.Blue-Grey.mc-active h2:before {
  border-top-color: transparent;
  border-right-color: #607D8B;
  border-bottom-color: #607D8B;
  border-left-color: transparent;
}
.material-card.Blue-Grey.mc-active h2:after {
  border-top-color: #263238;
  border-right-color: #263238;
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.material-card.Blue-Grey .mc-btn-action {
  background-color: #607D8B;
}
.material-card.Blue-Grey .mc-btn-action:hover {
  background-color: #263238;
}
.material-card.Blue-Grey .mc-footer h4 {
  color: #263238;
}
.material-card.Blue-Grey .mc-footer a {
  background-color: #263238;
}
.material-card.Blue-Grey.mc-active .mc-content {
  background-color: #ECEFF1;
}
.material-card.Blue-Grey.mc-active .mc-footer {
  background-color: #CFD8DC;
}
.material-card.Blue-Grey.mc-active .mc-btn-action {
  border-color: #ECEFF1;
}
body {
  background-color: #ECEFF1;
  color: #37474F;
  font-family: 'Raleway', sans-serif;
  font-weight: 300;
  font-size: 16px;
}
h1,
h2,
h3 {
  font-weight: 200;
}

</style>
<section class="container">
        <div class="page-header">
            <h1>Material cards demo<br>
              <small>See full features on <a href="https://github.com/marlenesco/material-cards" target="_blank">Github</a></small></h1>
        </div>
        <div class="row active-with-click">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Red">
                    <h2>
                        <span>Christopher Walken</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            The Deer Hunter
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-christopher-walken.jpg">
                        </div>
                        <div class="mc-description">
                            He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Pink">
                    <h2>
                        <span>Sean Penn</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Mystic River
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-sean-penn.jpg">
                        </div>
                        <div class="mc-description">
                            He has won two Academy Awards, for his roles in the mystery drama Mystic River (2003) and the biopic Milk (2008). Penn began his acting career in television with a brief appearance in a 1974 episode of Little House on the Prairie ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Purple">
                    <h2>
                        <span>Clint Eastwood</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Million Dollar Baby
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-clint-eastwood.jpg">
                        </div>
                        <div class="mc-description">
                            He rose to international fame with his role as the Man with No Name in Sergio Leone's Dollars trilogy of spaghetti Westerns during the 1960s ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Deep-Purple">
                    <h2>
                        <span>Dustin Hoffman</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Kramer vs. Kramer
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-dustin-hoffman.jpg">
                        </div>
                        <div class="mc-description">
                            He has been known for his versatile portrayals of antiheroes and vulnerable characters.[3] He won the Academy Award for Kramer vs. Kramer in 1979 ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Indigo">
                    <h2>
                        <span>Edward Norton</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            American History X
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-edward-norton.jpg">
                        </div>
                        <div class="mc-description">
                            He has been nominated for three Academy Awards for his work in the films Primal Fear, American History X and Birdman. He also starred in other roles ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Blue">
                    <h2>
                        <span>Michael Caine</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Educated Rita
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-michael-caine.jpg">
                        </div>
                        <div class="mc-description">
                            English actor and author. Renowned for his distinctive working class cockney accent, Caine has appeared in over 115 films and is regarded as a British ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Light-Blue">
                    <h2>
                        <span>Harvey Keitel</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Pulp Fiction
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-harvey-keitel.jpg">
                        </div>
                        <div class="mc-description">
                            Some of his most notable starring roles were in Martin Scorsese's Mean Streets and Taxi Driver, Ridley Scott's The Duellists and Thelma & Louise, Quentin Tarantino ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Cyan">
                    <h2>
                        <span>Jack Nicholson</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            The Shining
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-jack-nicholson.jpg">
                        </div>
                        <div class="mc-description">
                            Throughout his career, Nicholson has portrayed unique and challenging roles, many of which include dark portrayals of excitable, neurotic and psychopathic characters ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Teal">
                    <h2>
                        <span>Jeff Bridges</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            The Big Lebowski
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-jeff-bridges.jpg">
                        </div>
                        <div class="mc-description">
                            He comes from a well-known acting family and began his televised acting in 1958 as a child with his father, Lloyd Bridges, and brother, Beau, on television's Sea Hunt ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Green">
                    <h2>
                        <span>Joaquin Phoenix</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Her
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-joaquin-phoenix.jpg">
                        </div>
                        <div class="mc-description">
                            is an American actor, producer, music video director, musician and activist. For his work as an artist, Phoenix has received a Grammy Award, a Golden Globe Award and three Academy ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Light-Green">
                    <h2>
                        <span>Tom Hanks</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Forrest Gump
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-tom-hanks.jpg">
                        </div>
                        <div class="mc-description">
                            He is known for his roles in Big (1988), Philadelphia (1993), Forrest Gump (1994), Apollo 13 (1995), Saving Private Ryan, You've Got Mail (both 1998), The Green Mile (1999), Cast Away (2000) ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Lime">
                    <h2>
                        <span>Philip Seymour Hoffman</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            25th Hour
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-philip-seymour-hoffman.jpg">
                        </div>
                        <div class="mc-description">
                            Best known for his distinctive supporting and character roles – typically lowlifes, bullies, and misfits – Hoffman was a regular presence in films from the early 1990s until his death at age 46.
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Yellow">
                    <h2>
                        <span>Paul Newman</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            The Color of Money
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-paul-newman.jpg">
                        </div>
                        <div class="mc-description">
                            He won numerous awards, including an Academy Award for his performance in the 1986 film The Color of Money,[3] a BAFTA Award, a Screen Actors Guild Award, a Cannes Film Festival Award, an Emmy Award ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Amber">
                    <h2>
                        <span>Marlon Brando</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            The Godfather
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-marlon-brando.jpg">
                        </div>
                        <div class="mc-description">
                            He is hailed for bringing a gripping realism to film acting, and is frequently cited as the greatest and most influential actor of all time.[2] A cultural icon, Brando is most famous for his Academy ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Orange">
                    <h2>
                        <span>Kevin Spacey</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            American Beauty
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-kevin-spacey.jpg">
                        </div>
                        <div class="mc-description">
                            He began his career as a stage actor during the 1980s, before being cast in supporting roles in film and television. He gained critical acclaim in the early 1990s, culminating in his first Academy Award ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Deep-Orange">
                    <h2>
                        <span>Robert De Niro</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Taxy Driver
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-robert-de-niro.jpg">
                        </div>
                        <div class="mc-description">
                            His first major film roles were in the sports drama Bang the Drum Slowly (1973) and Martin Scorsese's crime film Mean Streets (1973). In 1974, after being turned down for the role of Sonny Corleone in the crime ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Brown">
                    <h2>
                        <span>Steve Mcqueen</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Papillon
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-steve-mcqueen.jpg">
                        </div>
                        <div class="mc-description">
                            Called "The King of Cool", his "anti-hero" persona, developed at the height of the Vietnam War-era counterculture, made him a top box-office draw of the 1960s and 1970s. McQueen received an Academy Award nomination for his ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Grey">
                    <h2>
                        <span>Rugter Hauer</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Blade Runner
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-rugter-hauer.jpg">
                        </div>
                        <div class="mc-description">
                            Blonde, blue-eyed, tall and handsome Dutch actor Rutger Hauer has an international reputation for playing everything from romantic leads to action heroes to sinister villains. Hauer was born in Breukelen, a town in the province ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="material-card Blue-Grey">
                        <h2>
                        <span>Morgan Freeman</span>
                        <strong>
                            <i class="fa fa-fw fa-star"></i>
                            Glory
                        </strong>
                    </h2>
                    <div class="mc-content">
                        <div class="img-container">
                            <img class="img-responsive" src="http://u.lorenzoferrara.net/marlenesco/material-card/thumb-morgan-freeman.jpg">
                        </div>
                        <div class="mc-description">
                            Freeman has received Academy Award nominations for his performances in Street Smart, Driving Miss Daisy, The Shawshank Redemption and Invictus ...
                        </div>
                    </div>
                    <a class="mc-btn-action">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="mc-footer">
                        <h4>
                            Social
                        </h4>
                        <a class="fa fa-fw fa-facebook"></a>
                        <a class="fa fa-fw fa-twitter"></a>
                        <a class="fa fa-fw fa-linkedin"></a>
                        <a class="fa fa-fw fa-google-plus"></a>
                    </div>
                </article>
            </div>
        </div>
    </section>
    
    <a href="https://github.com/marlenesco/material-cards" class="github-corner" aria-label="View source on Github" target="_blank"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#f44336; color:#ECEFF1; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>

    <script>
    $(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
    </script>