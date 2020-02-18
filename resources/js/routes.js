import VueRouter from 'vue-router';
import Home from './components/Site/Index.vue';
import ServerError from './components/Site/ServerError.vue';
import PageNotFound from './components/Site/PageNotFound.vue';
import UserProfileIndex from './components/Clients/Profile/Index.vue';
import UserChangePassword from './components/Clients/Profile/ChangePassword.vue';
import UserDetailContact from './components/Clients/Profile/UserDetail.vue';
import UserListDemoAccount from './components/Clients/DemoAccount/Index.vue';
import UserListRealAccount from './components/Clients/RealAccount/Index.vue';
import UserListDeposit from './components/Clients/Deposit/Index.vue';
import UserListWithdrawal from './components/Clients/Withdrawal/Index.vue';
import addRealAccount from './components/Clients/RealAccount/Add.vue';
import addRealAccount2 from './components/Clients/RealAccount/Add-2.vue';
import addRealAccount3 from './components/Clients/RealAccount/Add-3.vue';
import addRealAccount4 from './components/Clients/RealAccount/Add-4.vue';
import addRealAccount5 from './components/Clients/RealAccount/Add-5.vue';
import addRealAccount6 from './components/Clients/RealAccount/Add-6.vue';
import addRealAccount7 from './components/Clients/RealAccount/Add-7.vue';
import addRealAccount8 from './components/Clients/RealAccount/Add-8.vue';
import addRealAccount9 from './components/Clients/RealAccount/Add-9.vue';
import addRealAccount10 from './components/Clients/RealAccount/Add-10.vue';
import addRealAccount11 from './components/Clients/RealAccount/Add-11.vue';
import addRealAccount12 from './components/Clients/RealAccount/Add-12.vue';
import addRealAccount13 from './components/Clients/RealAccount/Add-13.vue';
import addRealAccount14 from './components/Clients/RealAccount/Add-14.vue';
import addRealAccount15 from './components/Clients/RealAccount/Add-15.vue';


import RootListRealAccount from './components/Admins/RealAccount/Index.vue';
import updateRealAccount from './components/Admins/RealAccount/Update.vue';
import addRealAccountAdmin from './components/Admins/RealAccount/Add.vue';

import RootListDemoAccount from './components/Admins/DemoAccount/Index.vue';

import RootListDeposit from './components/Admins/Deposit/Index.vue';

import RootListWithdrawal from './components/Admins/Withdrawal/Index.vue';

import RootListBanner from './components/Admins/Banner/Index.vue';

import RootListFiles from './components/Admins/Files/Index.vue';

import RootListNews from './components/Admins/News/Index.vue';

import RootListAdmin from './components/Admins/Admin/Index.vue';

import RootListUser from './components/Admins/User/Index.vue';

import RootEmail from './components/Admins/Email/Index.vue';

import RootPassword from './components/Admins/Admin/Password.vue';
import RootPartnership from './components/Admins/Partnership/Index.vue';
import RootContact from './components/Admins/Contact/Index.vue';
import RootNewslatter from './components/Admins/Newslatter/Index.vue';

let routes=[
{
	path:'/',
    name: 'Home',
    component: Home
}, 


/**
 * Error
*/
{
	path:'/server-error',
    name: 'ServerError',
    component: ServerError
}, 
{
	path:'*', 
    component: PageNotFound
}, 
{
	path:'/page-not-found',
    name: 'PageNotFound',
    component: PageNotFound
}, 


/**
 * Admin
*/

{
	path:'/root/list-real-account/index',
    name: 'RootListRealAccount',
    component: RootListRealAccount
},
{
	path:'/root/update-real-account/:id',
    name: 'updateRealAccount',
	component: updateRealAccount,
	props: true
},
{
	path:'/root/add-real-account',
    name: 'addRealAccountAdmin',
	component: addRealAccountAdmin
},
{
	path:'/root/list-demo-account/index',
    name: 'RootListDemoAccount',
    component: RootListDemoAccount
},
{
	path:'/root/list-deposit/index',
    name: 'RootListDeposit',
    component: RootListDeposit
},
{
	path:'/root/list-withdrawal/index',
    name: 'RootListWithdrawal',
    component: RootListWithdrawal
},
{
	path:'/root/list-banner/index',
    name: 'RootListBanner',
    component: RootListBanner
},
{
	path:'/root/files/index',
    name: 'RootListFiles',
    component: RootListFiles
},
{
	path:'/root/news/index',
    name: 'RootListNews',
    component: RootListNews
},
{
	path:'/root/admin/index',
    name: 'RootListAdmin',
    component: RootListAdmin
},
{
	path:'/root/user/index',
    name: 'RootListUser',
    component: RootListUser
},
{
	path:'/root/email/index',
    name: 'RootEmail',
    component: RootEmail
},
{
	path:'/root/password',
    name: 'RootPassword',
    component: RootPassword
},
{
	path:'/root/ib-partnership',
    name: 'RootPartnership',
    component: RootPartnership
},
{
	path:'/root/web-contact',
    name: 'RootContact',
    component: RootContact
},
{
	path:'/root/newslatter',
    name: 'RootNewslatter',
    component: RootNewslatter
},

/**
 * User
*/
{
	path:'/profile/index',
    name: 'UserProfileIndex',
    component: UserProfileIndex
},
{
	path:'/profile/change-password',
    name: 'UserChangePassword',
    component: UserChangePassword
},
{
	path:'/profile/detail-contact',
    name: 'UserDetailContact',
    component: UserDetailContact
},
{
	path:'/list-demo-account/index',
    name: 'UserListDemoAccount',
    component: UserListDemoAccount
},
{
	path:'/list-deposit/index',
    name: 'UserListDeposit',
    component: UserListDeposit
},
{
	path:'/list-withdrawal/index',
    name: 'UserListWithdrawal',
    component: UserListWithdrawal
},
{
	path:'/list-real-account/index',
    name: 'UserListRealAccount',
    component: UserListRealAccount
},
{
	path:'/list-real-account/add/:idnya',
	name: 'addRealAccount',
	component:addRealAccount
},
{
	path:'/list-real-account/add/step-2/:idnya',
	name: 'addRealAccount2',
	component:addRealAccount2
},
{
	path:'/list-real-account/add/step-3/:idnya',
	name: 'addRealAccount3',
	component:addRealAccount3
},
{
	path:'/list-real-account/add/step-4/:idnya',
	name: 'addRealAccount4',
	component:addRealAccount4
},
{
	path:'/list-real-account/add/step-5/:idnya',
	name: 'addRealAccount5',
	component:addRealAccount5
},
{
	path:'/list-real-account/add/step-6/:idnya',
	name: 'addRealAccount6',
	component:addRealAccount6
},
{
	path:'/list-real-account/add/step-7/:idnya',
	name: 'addRealAccount7',
	component:addRealAccount7
},
{
	path:'/list-real-account/add/step-8/:idnya',
	name: 'addRealAccount8',
	component:addRealAccount8
},
{
	path:'/list-real-account/add/step-9/:idnya',
	name: 'addRealAccount9',
	component:addRealAccount9
},
{
	path:'/list-real-account/add/step-10/:idnya',
	name: 'addRealAccount10',
	component:addRealAccount10
},
{
	path:'/list-real-account/add/step-11/:idnya',
	name: 'addRealAccount11',
	component:addRealAccount11
},
{
	path:'/list-real-account/add/step-12/:idnya',
	name: 'addRealAccount12',
	component:addRealAccount12
},
{
	path:'/list-real-account/add/step-13/:idnya',
	name: 'addRealAccount13',
	component:addRealAccount13
},
{
	path:'/list-real-account/add/step-14/:idnya',
	name: 'addRealAccount14',
	component:addRealAccount14
},
{
	path:'/list-real-account/add/step-15/:idnya',
	name: 'addRealAccount15',
	component:addRealAccount15
},


];

export default new VueRouter({
	routes,
	linkActiveClass: 'active'
});