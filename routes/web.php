<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ClientsController;

//Admin Controller
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoalTypeController;
use App\Http\Controllers\VechicleController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\StaffGoalController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StaffLeaveController;
use App\Http\Controllers\DaliyReportController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\RideRequestController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\DesignationsController;
use App\Http\Controllers\PolicyTypeController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PunchesController;
use App\Http\Controllers\StaffTypeController;
use App\Http\Controllers\CreateStaffController;


// Staff Controller
use App\Http\Controllers\GoalTrackingController;
use App\Http\Controllers\StaffClientsController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\SystemSettingsController;
use App\Http\Controllers\StaffAttendanceController;
use App\Http\Controllers\StaffDaliyReportController;
use App\Http\Controllers\StaffRideRequestController;
use App\Http\Controllers\StaffPolicyController;
use App\Http\Controllers\UserController;

// Human Resource Controller
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\HumanResourceDaliyReportController;
use App\Http\Controllers\HumanResourceGoalController;
use App\Http\Controllers\HumanResourceStaffController;
use App\Http\Controllers\HumanResourceAttendanceController;
use App\Http\Controllers\HumanResourceClientsController;
use App\Http\Controllers\HumanResourcePolicyController;
use App\Http\Controllers\HumanResourceRideRequestController;
use App\Http\Controllers\HumanResourceLeaveController;

// Sales Controller
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesDaliyReportController;
use App\Http\Controllers\SalesAttendanceController;
use App\Http\Controllers\SalesStaffController;
use App\Http\Controllers\SalesClientsController;
use App\Http\Controllers\SalesRideRequestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Prevent Back Starts Here
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Route::get('/dashboard', function () {
//     return view('admin.index');
    // })->middleware(['auth'])->name('dashboard');

    require __DIR__.'/auth.php';

    //Start Middleware
    Route::middleware('auth')->group(function () {
        // Admin Management All Routes Starts
        Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
            Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
            Route::get('/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
            Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
            // Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

            Route::post('/profile-information/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profileinformation.store');
            Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
            Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
        }); // Admin Management All Routes Ends

        // All Login Route
        Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);
        Route::get('/manager/login', [ManagerController::class, 'ManagerLogin'])->name('manager.login')->middleware(RedirectIfAuthenticated::class);
        Route::get('/staff/login', [UserController::class, 'UserLogin'])->name('staff.login')->middleware(RedirectIfAuthenticated::class);

        Route::get('/human-resource/login', [HumanResourceController::class, 'HrLogin'])->name('hr.login')->middleware(RedirectIfAuthenticated::class);
        Route::get('/sales/login', [SalesController::class, 'SalesLogin'])->name('sales.login')->middleware(RedirectIfAuthenticated::class);

        Route::get('/become/staff', [StaffController::class, 'BecomeStaff'])->name('become.staff');
        Route::post('/staff/register', [StaffController::class, 'StaffRegister'])->name('staff.register');


        // All Admin Routes Middleware  Starts Here
        Route::middleware(['auth','role:admin'])->group(function () {
            // Goal Type All Route starts Here
            Route::prefix('goal-type')->controller(GoalTypeController::class)->group(function () {
                Route::get('/view', 'ViewGoalType')->name('goaltype.view');
                Route::get('/add', 'AddGoalType')->name('goaltype.add');
                Route::post('/store', 'StoreGoalType')->name('goaltype.store');
                Route::get('/edit/{id}', 'EditGoalType')->name('goaltype.edit');
                Route::post('/update', 'UpdateGoalType')->name('goaltype.update');
                Route::get('/delete/{id}', 'DeleteGoalType')->name('goaltype.delete');
            });// Goal Type All Route Ends Here

            // Goal Tracking List All Route starts Here
            Route::prefix('goal-tracking')->controller(GoalTrackingController::class)->group(function () {
                Route::get('/view', 'ViewGoalTracking')->name('goaltracking.view');
                Route::get('/add', 'AddGoalTracking')->name('goaltracking.add');
                Route::post('/store', 'StoreGoalTracking')->name('goaltracking.store');
                Route::get('/edit/{id}', 'EditGoalTracking')->name('goaltracking.edit');
                Route::post('/update', 'UpdateGoalTracking')->name('goaltracking.update');
                Route::get('/delete/{id}', 'DeleteGoalTracking')->name('goaltracking.delete');
            });// Goal Tracking All Route Ends Here

            //Notice Board  All Route starts Here
            Route::prefix('notice-board')->controller(NoticeBoardController::class)->group(function () {
                Route::get('/view', 'ViewNoticeBoard')->name('noticeboard.view');
                Route::get('/add', 'AddNoticeBoard')->name('noticeboard.add');
                Route::post('/store', 'StoreNoticeBoard')->name('noticeboard.store');
                Route::get('/edit/{id}', 'EditNoticeBoard')->name('noticeboard.edit');
                Route::post('/update', 'UpdateNoticeBoard')->name('noticeboard.update');
                Route::get('/delete/{id}', 'DeleteNoticeBoard')->name('noticeboard.delete');
            });//Notice Board All Route Ends Here

            //Designations  All Route starts Here
            Route::prefix('designations')->controller(DesignationsController::class)->group(function () {
                Route::get('/view', 'ViewDesignations')->name('designations.view');
                Route::get('/add', 'AddDesignations')->name('designations.add');
                Route::post('/store', 'StoreDesignations')->name('designations.store');
                Route::get('/edit/{id}', 'EditDesignations')->name('designations.edit');
                Route::post('/update', 'UpdateDesignations')->name('designations.update');
                Route::get('/delete/{id}', 'DeleteDesignations')->name('designations.delete');

                Route::get('/assign-view', 'ViewAssignDesignations')->name('assign.view');
                // edit
                Route::get('/assign/{id}', 'AssignDesignations')->name('designations.assign');
                //update
                // /update/{id}
                Route::post('/assign-update/{id}', 'UpdateAssignDesignations')->name('assigndesignations.update');
            });//Designations All Route Ends Here

            //Employee  All Route starts Here
            Route::prefix('employees')->controller(EmployeesController::class)->group(function () {
                Route::get('/view', 'ViewEmployees')->name('staff.view');
                Route::get('/independent-view', 'ViewIndependentEmployees')->name('independent-staff.view');
                Route::get('/regular-view', 'ViewRegularEmployees')->name('regular-staff.view');


                Route::get('/active-staff/{id}', 'ActiveEmployees')->name('active.staff');
                Route::get('/inactive-staff/{id}', 'InActiveEmployees')->name('inactive.staff');

                Route::get('/profile', 'EditEmployeeProfile')->name('employees.profile');

                Route::get('/add', 'AddEmployees')->name('employees.add');
                Route::post('/store', 'StoreEmployees')->name('employees.store');
                Route::get('/edit/{id}', 'EditEmployees')->name('employees.edit');
                Route::post('/employees-update', 'UpdateEmployees')->name('employees.update');

                Route::get('/delete/{id}', 'DeleteEmployees')->name('employees.delete');

                Route::get('/active-staff-view', 'ViewActiveEmployees')->name('active.view');
                Route::get('/inactive-staff-view', 'ViewInactiveEmployees')->name('inactive.view');

                // Admin Change Password and View Password
                Route::get('/forgot-password', 'AdminViewStaffPassword')->name('adminstaff-forgot-password.view');
                Route::get('/change-password/{id}', 'AdminChangeStaffPassword')->name('adminstaffchange.password');
                Route::post('/update', 'AdminUpdateStaffPassword')->name('adminstaffpassword.update');

            }); //Employee Board All Route Ends Here

            // Vechicle Type All Route starts Here
            Route::prefix('vechicle')->controller(VechicleController::class)->group(function () {
                Route::get('/view', 'ViewVechicle')->name('vechicle.view');
                // Route::get('/add' , 'AddVechicle')->name('vechicle.add');
                Route::post('/store', 'StoreVechicle')->name('vechicle.store');
                Route::get('/edit/{id}', 'EditVechicle')->name('vechicle.edit');
                Route::post('/update', 'UpdateVechicle')->name('vechicle.update');
                Route::get('/delete/{id}', 'DeleteVechicle')->name('vechicle.delete');
            });// Vechicle Type All Route Ends Here

            // leave Type All Route starts Here
            Route::prefix('leave-type')->controller(LeaveTypeController::class)->group(function () {
                Route::get('/view', 'ViewLeaveType')->name('leavetype.view');
                Route::post('/store', 'StoreLeaveType')->name('leavetype.store');
                Route::get('/edit/{id}', 'EditLeaveType')->name('leavetype.edit');
                Route::post('/update', 'UpdateLeaveType')->name('leavetype.update');
                Route::get('/delete/{id}', 'DeleteLeaveType')->name('leavetype.delete');
            });// leave Type All Route Ends Here

            // leave  All Route starts Here
            Route::prefix('leave')->controller(LeaveController::class)->group(function () {
                Route::get('/view', 'ViewLeave')->name('leave.view');
                Route::post('/store', 'StoreLeave')->name('leave.store');
                Route::get('/edit/{id}', 'EditLeave')->name('leave.edit');
                Route::post('/update', 'UpdateLeave')->name('leave.update');
                Route::get('/delete/{id}', 'DeleteLeave')->name('leave.delete');

                Route::get('/approve-leave/{id}', 'ApproveLeave')->name('approve.leave');
                Route::get('/decline-leave/{id}', 'DeclineLeave')->name('decline.leave');
            });// leave  All Route Ends Here

            // Request Ride  All Route starts Here
            Route::prefix('ride')->controller(RideRequestController::class)->group(function () {
                Route::get('/view', 'ViewRideRequest')->name('ride.view');
                Route::get('/approve-ride/{id}', 'ApproveRideRequest')->name('approve.ride');
                Route::get('/decline-ride/{id}', 'DeclineRideRequest')->name('decline.ride');
            });// leave  All Route Ends Here

            // Request Ride  All Route starts Here
            Route::prefix('client')->controller(ClientsController::class)->group(function () {
                Route::get('/view', 'ViewClients')->name('clients.view');
                Route::get('/add', 'AddClients')->name('clients.add');
                Route::post('/store', 'StoreClients')->name('clients.store');
                Route::get('/edit/{id}', 'EditClients')->name('clients.edit');
                Route::post('/update', 'UpdateClients')->name('clients.update');
                Route::get('/delete/{id}', 'DeleteClients')->name('clients.delete');
            });// leave  All Route Ends Here

            // Attendance All Route starts Here
            Route::prefix('attendance')->controller(AttendanceController::class)->group(function () {
                Route::get('/view', 'ViewAttendance')->name('attendance.view');
                Route::get('/today-view', 'ViewTodayAttendance')->name('attendance.today-view');
                Route::get('/current-week-view', 'ViewCurrentWeekAttendance')->name('attendance.currentweek-view');
                Route::get('/last-week-view', 'ViewLastWeekAttendance')->name('attendance.lastweek-view');
                Route::get('/month-view', 'ViewMonthAttendance')->name('attendance.month-view');

                Route::get('/add', 'AddAttendance')->name('attendance.add');
                Route::post('/store', 'StoreAttendance')->name('attendance.store');
                Route::get('/edit/{id}', 'EditAttendance')->name('attendance.edit');
                Route::post('/update', 'UpdateAttendance')->name('attendance.update');
                Route::get('/delete/{id}', 'DeleteAttendance')->name('attendance.delete');
            });// Attendance  All Route Ends Here

            // System Settings All Route starts Here
            Route::prefix('systemsettings')->controller(SystemSettingsController::class)->group(function () {
                Route::get('/view', 'ViewSystemSettings')->name('systemsettings.view');
                Route::post('/store', 'StoreSystemSettings')->name('systemsettings.store');
            });//// System Settings All Route Route Ends Here

            // leave Type All Route starts Here
            Route::prefix('policy-type')->controller(PolicyTypeController::class)->group(function () {
                Route::get('/view', 'ViewPolicyType')->name('policytype.view');
                Route::post('/store', 'StorePolicyType')->name('policytype.store');
                Route::get('/edit/{id}', 'EditPolicyType')->name('policytype.edit');
                Route::post('/update/{id}', 'UpdatePolicyType')->name('policytype.update');
                Route::get('/delete/{id}', 'DeletePolicyType')->name('policytype.delete');
            });// leave Type All Route Ends Here

            // Daily Report All Route starts Here
            Route::prefix('daily-report')->controller(DaliyReportController::class)->group(function () {
                Route::get('/view', 'ViewDailyReport')->name('reports.view');
                Route::get('/today-view', 'ViewTodayDailyReport')->name('reports.today-view');
                Route::get('/last-week-view', 'ViewLastWeekDailyReport')->name('reports.last-week-view');
                Route::get('/current-week-view', 'ViewCurrentWeekDailyReport')->name('reports.current-week-view');
                Route::get('/month-view', 'ViewMonthDailyReport')->name('reports.month-view');
                Route::get('/edit/{id}', 'EditDailyReport')->name('reports.edit');
                Route::get('/read', 'ReadAllReport')->name('reports.read');
            });  // Daily Report All Route Route Ends Here


            // Staff Type All Route starts Here
            Route::prefix('staff-type')->controller(StaffTypeController::class)->group(function () {
                Route::get('/view', 'ViewStaffType')->name('staff-type.view');
                Route::get('/edit/{id}', 'EditStaffType')->name('staff-type.edit');
                Route::post('/staff-type-update', 'UpdateStaffType')->name('staff-type.update');
            });  // Staff Type  All Route Route Ends Here


            // Staff Type All Route starts Here
            Route::prefix('create-staff')->controller(CreateStaffController::class)->group(function () {
                Route::get('/view', 'ViewCreateStaff')->name('create-staff.view');
                Route::get('/create-staff', 'CreateStaff')->name('create.staff');
                Route::post('/store', 'StoreCreateStaff')->name('create-staff.store');

            });  // Staff Type  All Route Route Ends Here

        }); // Admin End Middleware














        // Manager Dashboard Management All Routes Starts
        Route::prefix('manager')->middleware(['auth','role:manager'])->group(function () {
            Route::get('/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashobard');
            Route::get('/logout', [ManagerController::class, 'ManagerDestroy'])->name('manager.logout');

            Route::get('/profile', [ManagerController::class, 'ManagerProfile'])->name('manager.profile');
            Route::post('/profile/store', [ManagerController::class, 'ManagerProfileStore'])->name('manager.profile.store');
            Route::get('/change/password', [ManagerController::class, 'ManagerChangePassword'])->name('manager.change.password');
            Route::post('/update/password', [ManagerController::class, 'ManagerUpdatePassword'])->name('manager.update.password');
        }); // Manager End Middleware




        // staff Dashboard Management All Routes Starts
        Route::prefix('staff')->middleware(['auth','role:staff'])->group(function () {
            Route::get('/dashboard', [StaffController::class, 'StaffDashboard'])->name('staff.dashobard');
            Route::get('/logout', [StaffController::class, 'StaffDestroy'])->name('staff.logout');
            Route::get('/profile', [StaffController::class, 'StaffProfile'])->name('staff.profile');

            Route::post('/profile-information/store', [StaffController::class, 'StaffProfileStore'])->name('staff.profileinformation.store');

            Route::post('/personal-informations/store', [StaffController::class, 'StaffPersonalStore'])->name('staff.personalinformation.store');
            Route::post('/personal-emergency/store', [StaffController::class, 'StaffEmergencyStore'])->name('staff.emergencycontact.store');

            Route::get('/change/password', [StaffController::class, 'StaffChangePassword'])->name('staff.change.password');
            Route::post('/update/password', [StaffController::class, 'StaffUpdatePassword'])->name('staff.update.password');

            Route::get('/ajax/{country_id}', [StaffController::class, 'GetCountry']);
        }); // staff End Middleware


        // All staff Routes Middleware  Starts Here
        Route::middleware(['auth','role:staff'])->group(function () {
            // Goal All Route
            Route::prefix('goal')->controller(StaffGoalController::class)->group(function () {
                Route::get('/view', 'ViewGoal')->name('goal.view');
            }); // Goal All Route Ends

            // Report All Route
            Route::prefix('report')->controller(StaffDaliyReportController::class)->group(function () {
                Route::get('/view', 'ViewStaffDaliyReport')->name('staffreport.view');
                Route::post('/store', 'StoreStaffDaliyReport')->name('staffreport.store');
            });// Report All Route

            // Attendance All Route
            Route::prefix('attendances')->controller(StaffAttendanceController::class)->group(function () {
                Route::get('/view', 'ViewStaffAttendance')->name('punch.view');
                Route::get('/punch-in', 'PunchIn')->name('attendance.punch-in');
                Route::get('/punch-out', 'PunchOut')->name('attendance.punch-out');
            });// Attendance All Route

            // myclients All Route
            Route::prefix('myclients')->controller(StaffClientsController::class)->group(function () {
                Route::get('/view', 'ViewMyClients')->name('myclients.view');
                Route::get('/add', 'AddMyClients')->name('myclients.add');
                Route::post('/store', 'StoreMyClients')->name('myclients.store');
                Route::get('/edit/{id}', 'EditMyClients')->name('myclients.edit');
                Route::post('/update', 'UpdateMyClients')->name('myclients.update');
                Route::get('/delete/{id}', 'DeleteMyClients')->name('myclients.delete');
            }); // myclients All Route Ends


            // myclients All Route
            Route::prefix('riderequest')->controller(StaffRideRequestController::class)->group(function () {
                Route::get('/history', 'ViewRideRequestHistory')->name('riderequest.history');
                Route::get('/add', 'AddRideRequest')->name('riderequest.add');
                Route::post('/store', 'StoreRideRequest')->name('riderequest.store');
            }); // myclients All Route Ends

            // leave  All Route starts Here
            Route::prefix('leave')->controller(StaffLeaveController::class)->group(function () {
                Route::get('/leave-request', 'ViewStaffLeaveRequest')->name('staffleaverequest.view');

                Route::get('/leave-status', 'ViewStaffLeaveStatus')->name('staffleavestatus.view');

                Route::post('/store', 'StoreStaffLeave')->name('staffleave.store');

                Route::get('/edit/{id}', 'EditStaffLeave')->name('staffleave.edit');
                Route::post('/update', 'UpdateStaffLeave')->name('staffleave.update');
                Route::get('/delete/{id}', 'DeleteStaffLeave')->name('staffleave.delete');
            });// leave  All Route Ends Here

            // Policy All Route
            Route::prefix('policy')->controller(StaffPolicyController::class)->group(function () {
                Route::get('/view', 'ViewStaffPolicy')->name('policy.view');
                Route::post('/store', 'StoreStaffPolicy')->name('policy.store');
            });// Policy All Route
        }); // staff End Middleware


        // HR Dashboard Management All Routes Starts
        Route::prefix('hr')->middleware(['auth','role:hr'])->group(function () {
            Route::get('/dashboard', [HumanResourceController::class, 'HumanResourceDashboard'])->name('human-resource.dashobard');
            Route::get('/logout', [HumanResourceController::class, 'HumanResourceDestroy'])->name('human-resource.logout');
            Route::get('/profile', [HumanResourceController::class, 'HumanResourceProfile'])->name('human-resource.profile');

            Route::post('/profile-information/store', [HumanResourceController::class, 'HumanResourceProfileStore'])->name('human-resource.profileinformation.store');
            Route::get('/change/password', [HumanResourceController::class, 'HumanResourceChangePassword'])->name('human-resource.change.password');
            Route::post('/update/password', [HumanResourceController::class, 'HumanResourceUpdatePassword'])->name('human-resource.update.password');
        }); // HR End Middleware


        // All HR Routes Middleware  Starts Here
        Route::middleware(['auth','role:hr'])->group(function () {
            // DaliyReport Human Resource All Route starts Here
            Route::prefix('human-resource-daily-report')->controller(HumanResourceDaliyReportController::class)->group(function () {
                Route::get('/view', 'HumanResourceViewDailyReport')->name('human-resource-reports.view');
                Route::get('/edit/{id}', 'HumanResourceEditDailyReport')->name('human-resource-reports.edit');
                Route::get('/today-view', 'HumanResourceViewTodayDailyReport')->name('human-resource-reports.today-view');
                Route::get('/last-week-view', 'HumanResourceViewLastWeekDailyReport')->name('human-resource-reports.last-week-view');
                Route::get('/current-week-view', 'HumanResourceViewCurrentWeekDailyReport')->name('human-resource-reports.current-week-view');
                Route::get('/month-view', 'HumanResourceViewMonthDailyReport')->name('human-resource-reports.month-view');

            });  // DaliyReport Human Resource All Route Route Ends Here

            // Goal Human Resource Goal All Route
            Route::prefix('human-resource-goal')->controller(HumanResourceGoalController::class)->group(function () {
                Route::get('/view', 'HumanResourceViewGoal')->name('human-resource-goal.view');
            }); // Goal Human Resource Goal All Route Ends

            //Staff Human Resource Staff  All Route starts Here
            Route::prefix('human-resource-staff')->controller(HumanResourceStaffController::class)->group(function () {
                Route::get('/view', 'HumanResourceViewStaff')->name('human-resource-staff.view');
            }); //Staff Human Resource Staff All Route Ends Here

            //Clients Human Resource All Route starts Here
            Route::prefix('human-resource-client')->controller(HumanResourceClientsController::class)->group(function () {
                Route::get('/view', 'HumanResourceViewClients')->name('human-resource-clients.view');
            }); //ClientsHuman Resource All Route Ends Here


            // Policy Human Resource  All Route
            Route::prefix('human-resource-policy')->controller(HumanResourcePolicyController::class)->group(function () {
                Route::get('/view', 'HumanResourceViewPolicy')->name('human-resource-policy.view');
            });// Policy Human Resource  All Route

            // Human Resource  Attendance All Route starts Here
            Route::prefix('human-resource-attendance')->controller(HumanResourceAttendanceController::class)->group(function () {
                Route::get('/view', 'HumanResourceViewAttendance')->name('human-resource-attendance.view');
                Route::get('/today-view', 'HumanResourceViewTodayAttendance')->name('human-resource-attendance.today-view');
                Route::get('/month-view', 'HumanResourceViewMonthAttendance')->name('human-resource-attendance.month-view');


                Route::get('/last-week-view', 'HumanResourceViewLastWeekAttendance')->name('human-resource-attendance.last-week-view');
                Route::get('/current-week-view', 'HumanResourceViewCurrentWeekAttendance')->name('human-resource-attendance.current-week-view');
            });// Human Resource  Attendance  All Route Ends Here

            // Human Resource  Request Ride  All Route starts Here
            Route::prefix('human-resource-ride')->controller(HumanResourceRideRequestController::class)->group(function () {
                Route::get('/view', 'ViewRideRequest')->name('human-resource-ride.view');
                Route::get('/hr-approve-ride/{id}', 'HumanResourceApproveRideRequest')->name('human-resource-approve.ride');
                Route::get('/hr-decline-ride/{id}', 'HumanResourceDeclineRideRequest')->name('human-resource-decline.ride');
            });// Human Resource  Ride  All Route Ends Here

            // Human Resource Leave  All Route starts Here
            Route::prefix('human-resource-leave')->controller(HumanResourceLeaveController::class)->group(function () {
                Route::get('/view', 'HumanResourceViewLeave')->name('human-resource-leave.view');
            });// Human Resource  Ride  All Route Ends Here
        }); // HR End Middleware



        // Sales Dashboard Management All Routes Starts
        Route::prefix('sales')->middleware(['auth','role:sales'])->group(function () {
            Route::get('/dashboard', [SalesController::class, 'SalesDashboard'])->name('sales.dashobard');
            Route::get('/logout', [SalesController::class, 'SalesDestroy'])->name('sales.logout');
            Route::get('/profile', [SalesController::class, 'SalesProfile'])->name('sales.profile');

            Route::post('/profile-information/store', [SalesController::class, 'SalesProfileStore'])->name('sales.profileinformation.store');
            Route::get('/change/password', [SalesController::class, 'SalesChangePassword'])->name('sales.change.password');
            Route::post('/update/password', [SalesController::class, 'SalesUpdatePassword'])->name('sales.update.password');
        }); // Sales End Middleware

        // All Sales Routes Middleware  Starts Here
        Route::middleware(['auth','role:sales'])->group(function () {
            // DaliyReport Sales All Route starts Here
            Route::prefix('sales-daily-report')->controller(SalesDaliyReportController::class)->group(function () {
                Route::get('/view', 'SalesViewDailyReport')->name('sales-reports.view');
                Route::get('/edit/{id}', 'SalesEditDailyReport')->name('sales-reports.edit');
                Route::get('/today-view', 'SalesViewTodayDailyReport')->name('sales-reports.today-view');
                Route::get('/last-week-view', 'SalesViewLastWeekDailyReport')->name('sales-reports.last-week-view');
                Route::get('/current-week-view', 'SalesViewCurrentWeekDailyReport')->name('sales-reports.current-week-view');
                Route::get('/month-view', 'SalesViewMonthDailyReport')->name('sales-reports.month-view');
            });  // DaliyReport Sales All Route Route Ends Here

            // Sale Attendance All Route starts Here
            Route::prefix('sales-attendance')->controller(SalesAttendanceController::class)->group(function () {
                Route::get('/view', 'SalesViewAttendance')->name('sales-attendance.view');
                Route::get('/today-view', 'SalesViewTodayAttendance')->name('sales-attendance.today-view');
                Route::get('/last-week-view', 'SalesViewLastWeekAttendance')->name('sales-attendance.last-week-view');
                Route::get('/current-week-view', 'SalesViewCurrentWeekAttendance')->name('sales-attendance.current-week-view');
                Route::get('/month-view', 'SalesViewMonthAttendance')->name('sales-attendance.month-view');
            });// Sale Attendance  All Route Ends Here

            //Sales Staff  All Route starts Here
            Route::prefix('sales-staff')->controller(SalesStaffController::class)->group(function () {
                Route::get('/view', 'SalesViewStaff')->name('sale-staff.view');
            }); //Sales Staff All Route Ends Here

            //Clients Sales All Route starts Here
            Route::prefix('sales-client')->controller(SalesClientsController::class)->group(function () {
                Route::get('/view', 'SalesViewClients')->name('sales-clients.view');
            }); //Clients Sales All Route Ends Here

            // Human Resource  Request Ride  All Route starts Here
            Route::prefix('sales-ride')->controller(SalesRideRequestController::class)->group(function () {
                Route::get('/view', 'SalesViewRideRequest')->name('sale-ride.view');
            });// Human Resource  Ride  All Route Ends Here




        }); // Sales End Middleware






    }); //prevent-back-history
}); //End Middleware
