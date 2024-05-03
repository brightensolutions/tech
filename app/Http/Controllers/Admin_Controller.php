<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\Home;
use App\Models\Opening;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\Blog;
use App\Models\CSR;
use App\Models\Galleryimages;
use App\Models\Certificate;
use App\Models\Career;
use App\Models\Contact;
use App\Models\Contactrequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\About;


class Admin_Controller extends Controller
{
    public function login()
    {
        if (session()->has('email')) {
            return redirect("/super-admin/home");
        } else {
            return view('admin.login');
        }
    }

    public function checklogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->put('email', $credentials['email']);
            return redirect()->intended('super-admin/dashboard')->withSuccess('You have Successfully loggedin');
        }
        session()->flash('message', 'Opps! You have entered invalid credentials');
        return redirect("super-admin/login");
    }

    public function showdashboard()
    {
        return view('admin.dashboard');
    }

    public function openings()
    {
        $data= Opening::all();
        return view('admin.openings',compact('data'));
    }

    public function addopenings()
    {
        return view('admin.add-openings');
    }

    // public function updatesliderimage1(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('sliderimage1')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->slider_1;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/banner1/' . $oldImage))) {
    //             File::delete(public_path('assets/images/banner1/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('sliderimage1')->getClientOriginalName();
    //         $request->file('sliderimage1')->move(public_path('assets/images/banner1/'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['slider_1' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/banner1/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updatesliderimage2(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('sliderimage2')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->slider_2;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/banner1/' . $oldImage))) {
    //             File::delete(public_path('assets/images/banner1/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('sliderimage2')->getClientOriginalName();
    //         $request->file('sliderimage2')->move(public_path('assets/images/banner1/'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['slider_2' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/banner1/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updatesliderimage3(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('sliderimage3')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->slider_3;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/banner1/' . $oldImage))) {
    //             File::delete(public_path('assets/images/banner1/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('sliderimage3')->getClientOriginalName();
    //         $request->file('sliderimage3')->move(public_path('assets/images/banner1/'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['slider_3' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/banner1/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updateaboutimage1(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('aboutimageInput1')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->image1;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/banne1' . $oldImage))) {
    //             File::delete(public_path('assets/images/banner1' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('aboutimageInput1')->getClientOriginalName();
    //         $request->file('aboutimageInput1')->move(public_path('assets/images/banner1'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['image1' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/banner1/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updateaboutimage2(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('aboutimageInput2')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->image2;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/banne1' . $oldImage))) {
    //             File::delete(public_path('assets/images/banner1' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('aboutimageInput2')->getClientOriginalName();
    //         $request->file('aboutimageInput2')->move(public_path('assets/images/banner1'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['image2' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/banner1/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updateaboutimage3(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('aboutimageInput3')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->image3;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/banne1' . $oldImage))) {
    //             File::delete(public_path('assets/images/banner1' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('aboutimageInput3')->getClientOriginalName();
    //         $request->file('aboutimageInput3')->move(public_path('assets/images/banner1'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['image3' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/banner1/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }
    // public function updateaboutcontent(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'aboutcontent' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $content = $request->input('aboutcontent');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $home = Home::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $home->about_content = $content;
    //         $home->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $home->about_content,
    //             'message' => 'Content updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function updatenumberform(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'client' => 'required|string', // Add any other validation rules you need here
    //         'experience' => 'required|string',
    //         'storage' => 'required|string'
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $clients = $request->input('client');
    //         $experience = $request->input('experience');
    //         $storage = $request->input('storage');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $home = Home::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $home->clients = $clients;
    //         $home->experience = $experience;
    //         $home->storage = $storage;
    //         $home->save();

    //         // Return success response
    //         return response()->json([
    //             // 'title' => $home->about_content,
    //             'message' => 'Data updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }


    // public function bookings()
    // {
    //     $bookings= Booking::all();

    //     return view('admin.bookings', compact('bookings'));
    // }

    // public function contact()
    // {
    //     $contacts= Contact::all();

    //     return view('admin.contact', compact('contacts'));
    // }

    // public function home()
    // {
    //     $data = Home::first();
    //     return view('admin.home', compact('data'));
    // }

    // public function homeproducts()
    // {
    //     $data = Homeproduct::all();
    //     return view('admin.home-product', compact('data'));
    // }

    // public function addhomeproduct()
    // {
    //     return view('admin.add-home-product');
    // }

    // public function addedhomeproduct(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('image')) {
    //         // Upload the new image
    //         $fileName = $request->file('image')->getClientOriginalName();
    //         $request->file('image')->move(public_path('assets/images/product/'), $fileName);

    //         // Create a new Home instance
    //         $data = new Homeproduct();
    //         $data->image = $fileName;
    //         $data->name = $request->name;
    //         // Assign other fields as needed

    //         $data->save();

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/product/' . $fileName),
    //             'message' => 'Product added successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function deletehomeproduct($id)
    // {
    //     // Find the international journey record by its ID
    //     $home = Homeproduct::findOrFail($id);

    //     // Delete the journey record
    //     $home->delete();

    //     // You can optionally return a response here, such as a success message or redirecting the user
    //     return response()->json([
    //         'message' => 'Home Product deleted successfully'
    //     ], 200);
    // }

    // public function testimonial()
    // {
    //     $data = Testimonial::all();
    //     return view('admin.testimonial', compact('data'));
    // }

    // public function deletetestimonial($id)
    // {
    //     // Find the career record by its ID
    //     $testimonial = Testimonial::findOrFail($id);

    //     // Delete the career record
    //     $testimonial->delete();

    //     // Flash the success message to the session
    //     session()->flash('success', 'Testimonial deleted successfully');

    //     // Redirect back to the previous page or any desired route
    //     return redirect()->back();
    // }

    // public function addtestimonial()
    // {
    //     return view('admin.add-testimonial');
    // }

    // public function addedtestimonial(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'name' => 'required|string',
    //         'designation' => 'required|string',
    //         'review' => 'required|string',
    //     ]);

    //     // Create a new testimonial entry
    //     $testimonial = new Testimonial();
    //     $testimonial->name = $request->input('name');
    //     $testimonial->designation = $request->input('designation');
    //     $testimonial->review = $request->input('review');
    //     // Assign category and subcategory IDs based on your database structure
    //     // For example, assuming 'cat_id' and 'sub_cat_id' are foreign keys in your testimonial table

    //     $testimonial->save();

    //     // Return success response
    //     return response()->json([
    //         'message' => 'Testimonial added successfully'
    //     ], 200);
    // }

    // public function contact()
    // {
    //     $data = Contact::first();
    //     return view('admin.contact', compact('data'));
    // }

    // public function updateaddress(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'address' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $address = $request->input('address');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $contact = Contact::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $contact->address = $address;
    //         $contact->save();

    //         // Return success response
    //         return response()->json([
    //             'address' => $contact->address,
    //             'message' => 'Address updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function updateemail(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'email' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $email = $request->input('email');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $contact = Contact::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $contact->email = $email;
    //         $contact->save();

    //         // Return success response
    //         return response()->json([
    //             'email' => $contact->email,
    //             'message' => 'Email updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function updatemobile(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'mobile' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $mobile = $request->input('mobile');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $contact = Contact::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $contact->mobile = $mobile;
    //         $contact->save();

    //         // Return success response
    //         return response()->json([
    //             'mobile' => $contact->mobile,
    //             'message' => 'Mobile updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }


    // public function addedblog(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'video' => 'required|file|mimes:mp4,mov,avi,wmv', // Adjust file types as needed
    //     ]);

    //     // Check if a video file is provided
    //     if ($request->hasFile('video')) {
    //         // Retrieve the uploaded file
    //         $videoFile = $request->file('video');

    //         // Get the original file name of the uploaded video file
    //         $videoName = $videoFile->getClientOriginalName();

    //         // Move the uploaded file to the desired directory using its original name
    //         $videoFile->move(public_path('assets/img'), $videoName);

    //         // Create a new video entry
    //         $video = new Blog();
    //         $video->video = $videoName; // Store the file path in the database

    //         $video->save();

    //         // Return success response
    //         return response()->json([
    //             'video' => $video->video, // You can return the video path if needed
    //             'message' => 'Video added successfully'
    //         ], 200);
    //     }

    //     // If no video file is provided, return error response
    //     return response()->json([
    //         'message' => 'No video file provided'
    //     ], 400);
    // }

    // //csr

    // public function csr()
    // {
    //     $data = CSR::first();
    //     return view('admin.csr', compact('data'));
    // }


    // public function about()
    // {
    //     $data = About::first();
    //     return view('admin.about', compact('data'));
    // }

    // public function updateaboutvideo(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('aboutvideo')) {
    //         // Get the old video filename from the database
    //         $oldVideo = Home::first()->video;

    //         // Delete the old video if it exists
    //         if ($oldVideo && File::exists(public_path('assets/images/background/' . $oldVideo))) {
    //             File::delete(public_path('assets/images/background/' . $oldVideo));
    //         }

    //         // Upload the new video
    //         $fileName = $request->file('aboutvideo')->getClientOriginalName();
    //         $request->file('aboutvideo')->move(public_path('assets/images/background/'), $fileName);

    //         // Update the database with the new video filename
    //         Home::first()->update(['video' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'video_url' => asset('assets/images/background/' . $fileName),
    //             'message' => 'Video updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No video uploaded'
    //     ], 400);
    // }

    // public function updatecompany(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'company' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $company = $request->input('company');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $about = About::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $about->company = $company;
    //         $about->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $about->company,
    //             'message' => 'Company updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function updateimage1(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('aboutimage')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->image;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/background' . $oldImage))) {
    //             File::delete(public_path('assets/images/background' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('aboutimage')->getClientOriginalName();
    //         $request->file('aboutimage')->move(public_path('assets/images/background'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['image' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/background/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updatewhychoose(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'whychoose' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $whychoose = $request->input('whychoose');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $about = About::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $about->why_choose_you = $whychoose;
    //         $about->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $about->why_choose_you,
    //             'message' => 'Why Choose you updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function updateimage2(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('image1')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->image1;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/background' . $oldImage))) {
    //             File::delete(public_path('assets/images/background' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('image1')->getClientOriginalName();
    //         $request->file('image1')->move(public_path('assets/images/background'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['image1' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/background/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updateimage3(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('image2')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->image2;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/background' . $oldImage))) {
    //             File::delete(public_path('assets/images/background' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('image2')->getClientOriginalName();
    //         $request->file('image2')->move(public_path('assets/images/background'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['image2' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/background/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updateimage4(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('image3')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->image3;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/images/background' . $oldImage))) {
    //             File::delete(public_path('assets/images/background' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('image3')->getClientOriginalName();
    //         $request->file('image3')->move(public_path('assets/images/background'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['image3' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/background/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    //certificate

    // public function certificate()
    // {
    //     $data = Certificate::all();
    //     return view('admin.certificate', compact('data'));
    // }


    // public function deletecertificate($id)
    // {
    //     try {
    //         // Find the gallery image record by its ID
    //         $gallery = Certificate::findOrFail($id);

    //         // Delete the gallery image record
    //         $gallery->delete();

    //         // Return success response with redirect URL
    //         return redirect()->back()->with('success', 'Certificate deleted successfully');
    //     } catch (\Exception $e) {
    //         // Return error response if deletion fails
    //         return redirect()->back()->with('error', 'Failed to delete gallery image');
    //     }
    // }

    // public function addcertificate()
    // {
    //     return view('admin.add-certificate');
    // }

    // public function addedcertificate(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Check if files are uploaded
    //     if ($request->hasFile('images')) {
    //         $imageUrls = [];

    //         // Iterate over each uploaded image
    //         foreach ($request->file('images') as $image) {
    //             // Upload the new image
    //             $fileName = $image->getClientOriginalName();
    //             $image->move(public_path('assets/images/newimg/'), $fileName);

    //             // Create a new gallery entry
    //             $gallery = new Certificate();
    //             $gallery->image = $fileName;
    //             $gallery->save();

    //             // Store the URL of the uploaded image
    //             $imageUrls[] = asset('assets/images/newimg/' . $fileName);
    //         }

    //         // Return success response with message
    //         return response()->json(['message' => 'Certificate images added successfully'], 200);
    //     }

    //     // If no files are uploaded, return error response with message
    //     return response()->json(['message' => 'No images uploaded'], 422);
    // }

    // public function contactrequest()
    // {
    //     $data = Contactrequest::all();

    //     return view('admin.contact-request', compact('data'));
    // }

    // public function addedcontactrequest(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'fname' => 'required|string',
    //         'lname' => 'required|string',
    //         'email' => 'required|email',
    //         'mobile' => 'required|string',
    //         'message' => 'required|string'
    //     ]);

    //     // Retrieve form data
    //     $fname = $request->input('fname');
    //     $lname = $request->input('lname');
    //     $email = $request->input('email');
    //     $mobile = $request->input('mobile');
    //     $message = $request->input('message');

    //     // Process the form data as needed
    //     // For example, you can create a new contact request entry in the database
    //     $contactRequest = new ContactRequest();
    //     $contactRequest->fname = $fname;
    //     $contactRequest->lname = $lname;
    //     $contactRequest->email = $email;
    //     $contactRequest->mobile = $mobile;
    //     $contactRequest->message = $message;

    //     $contactRequest->save();

    //     // Return success response
    //     return response()->json([
    //         'message' => 'Contact request added successfully'
    //     ], 200);
    // }

    // public function deletecontactrequest($id)
    // {
    //     // Find the career record by its ID
    //     $career = Contactrequest::findOrFail($id);

    //     // Delete the career record
    //     $career->delete();

    //     // Flash the success message to the session
    //     session()->flash('success', 'Contact request deleted successfully');

    //     // Redirect back to the previous page or any desired route
    //     return redirect()->back();
    // }



    // //career

    // public function career()
    // {
    //     $data = Career::all();
    //     return view('admin.career', compact('data'));
    // }

    // public function deletecareer($id)
    // {
    //     // Find the career record by its ID
    //     $career = Career::findOrFail($id);

    //     // Delete the career record
    //     $career->delete();

    //     // Flash the success message to the session
    //     session()->flash('success', 'Career deleted successfully');

    //     // Redirect back to the previous page or any desired route
    //     return redirect()->back();
    // }

    // //contact



    // //contact details



    //products

    // public function product()
    // {
    //     $data = Product::with('category', 'subcategory')->get();
    //     return view('admin.product', compact('data'));
    // }

    // public function deleteproduct($id)
    // {
    //     // Find the career record by its ID
    //     $product = Product::findOrFail($id);

    //     // Delete the career record
    //     $product->delete();

    //     // Flash the success message to the session
    //     session()->flash('success', 'Product deleted successfully');

    //     // Redirect back to the previous page or any desired route
    //     return redirect()->back();
    // }

    // public function addedproduct(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'category' => 'required|integer',
    //         'subcategory' => 'required|integer',
    //     ]);

    //     // Retrieve the category ID, subcategory ID, and image file from the request
    //     $categoryId = $request->input('category');
    //     $subcategoryId = $request->input('subcategory');
    //     $banner = $request->file('banner');
    //     $image1 = $request->file('image1');
    //     $content1 = $request->file('content1');
    //     $image2 = $request->file('image2');
    //     $image3 = $request->file('image3');
    //     $content2 = $request->file('content2');
    //     $image4 = $request->file('image4');

    //     $fileName4 = $banner->getClientOriginalName();
    //     $banner->move(public_path('assets/images/cabal'), $fileName);

    //     // Upload the new image
    //     $fileName = $image1->getClientOriginalName();
    //     $image1->move(public_path('assets/images/cabal'), $fileName);

    //     $fileName2 = $image2->getClientOriginalName();
    //     $image2->move(public_path('assets/images/cabal'), $fileName);

    //     $fileName3 = $image3->getClientOriginalName();
    //     $image3->move(public_path('assets/images/cabal'), $fileName);

    //     // Create a new product entry
    //     $product = new Product();
    //     $product->cat_id = $categoryId;
    //     $product->sub_cat_id = $subcategoryId;
    //     $product->banner = $fileName4;
    //     $product->image1 = $fileName; // Store the image file name in the database
    //     $product->$content1 = $content1;
    //     $product->image2 = $fileName2;
    //     $product->image3 = $fileName3;
    //     $product->$content2 = $content2;
    //     $product->save();

    //     // Return success response with the image URL
    //     $imageUrl = asset('assets/product/img/' . $fileName);
    //     return response()->json([
    //         'product_id' => $product->id,
    //         'image_url' => $imageUrl,
    //         'message' => 'Product added successfully'
    //     ], 200);
    // }

    // public function fetchSubcategories(Request $request)
    // {
    //     $categoryId = $request->input('categoryId');

    //     // Fetch subcategories based on the selected category ID using the relationship
    //     // $category = Category::find($categoryId);
    //     $subcategories = Subcategory::where('cat_id', $categoryId)->get();

    //     // Return subcategories as JSON response
    //     return response()->json(['subcategories' => $subcategories]);
    // }

    // public function category()
    // {
    //     $data = Category::all();
    //     return view('admin.category', compact('data'));
    // }

    // public function addedcategory(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'category' => 'required|string',
    //     ]);

    //     // Check if category name is provided
    //     if ($request->has('category')) {
    //         // Retrieve the category name
    //         $categoryName = $request->input('category');

    //         // Create a new category entry
    //         $category = new Category();
    //         $category->cat_name = $categoryName; // Store the category name in the database

    //         $category->save();

    //         // Return success response
    //         return response()->json([
    //             'category' => $category->cat_name, // You can return the category name if needed
    //             'message' => 'Category added successfully'
    //         ], 200);
    //     }

    //     // If no category name is provided, return error response
    //     return response()->json([
    //         'message' => 'No category name provided'
    //     ], 400);
    // }

    // public function addcategory()
    // {
    //     return view('admin.add-category');
    // }

    // public function deletecategory($id)
    // {
    //     // Find the career record by its ID
    //     $category = Category::findOrFail($id);

    //     // Delete the career record
    //     $category->delete();

    //     // Flash the success message to the session
    //     session()->flash('success', 'Category deleted successfully');

    //     // Redirect back to the previous page or any desired route
    //     return redirect()->back();
    // }

    // public function addedcertificat(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Check if files are uploaded
    //     if ($request->hasFile('images')) {
    //         $imageUrls = [];

    //         // Iterate over each uploaded image
    //         foreach ($request->file('images') as $image) {
    //             // Upload the new image
    //             $fileName = $image->getClientOriginalName();
    //             $image->move(public_path('assets/img/'), $fileName);

    //             // Create a new gallery entry
    //             $gallery = new Certificate();
    //             $gallery->image = $fileName;
    //             $gallery->save();

    //             // Store the URL of the uploaded image
    //             $imageUrls[] = asset('assets/img/' . $fileName);
    //         }

    //         // Return success response with message
    //         return response()->json(['message' => 'Certificate images added successfully'], 200);
    //     }

    //     // If no files are uploaded, return error response with message
    //     return response()->json(['message' => 'No images uploaded'], 422);
    // }




    public function adminlogout()
    {
        session()->pull('email', null);
        return redirect('/super-admin/login');
    }

    // //home
    // public function updatehometitle(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'title' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $title = $request->input('title');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $home = Home::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $home->hero_title = $title;
    //         $home->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $home->hero_title,
    //             'message' => 'Title updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function updatehomecontent(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'content' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $content = $request->input('content');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $home = Home::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $home->hero_content = $content;
    //         $home->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $home->hero_content,
    //             'message' => 'Content updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // public function updatehomeimage1(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('image1')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->image1;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/img/' . $oldImage))) {
    //             File::delete(public_path('assets/img/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('image1')->getClientOriginalName();
    //         $request->file('image1')->move(public_path('assets/img/'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['image1' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/img/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updatehomeimage2(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('image2')) {
    //         // Get the old image filename from the database
    //         $oldImage = Home::first()->image1;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/img/' . $oldImage))) {
    //             File::delete(public_path('assets/img/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('image2')->getClientOriginalName();
    //         $request->file('image2')->move(public_path('assets/img/'), $fileName);

    //         // Update the database with the new image filename
    //         Home::first()->update(['image2' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/img/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // //about




    // public function updateabouttitle(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'title' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $title = $request->input('title');
    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $about = About::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $about->title = $title;
    //         $about->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $about->title,
    //             'message' => 'Title updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }



    // public function updatedirectorimage1(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('directorimage1')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->director1;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/img/' . $oldImage))) {
    //             File::delete(public_path('assets/img/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('directorimage1')->getClientOriginalName();
    //         $request->file('directorimage1')->move(public_path('assets/img/'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['director1' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/img/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updatedirectorimage2(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('directorimage2')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->director2;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/img/' . $oldImage))) {
    //             File::delete(public_path('assets/img/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('directorimage2')->getClientOriginalName();
    //         $request->file('directorimage2')->move(public_path('assets/img/'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['director2' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/img/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // //believes

    // public function updatedbelieve(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'quality' => 'required|string',
    //         'uniform' => 'required|string',
    //         'satisfaction' => 'required|string',
    //         'mission' => 'required|string',
    //     ]);

    //     try {
    //         // Get the data from the request
    //         $quality = $request->input('quality');
    //         $uniform = $request->input('uniform');
    //         $satisfaction = $request->input('satisfaction');
    //         $mission = $request->input('mission');

    //         // Update the belief data in the database
    //         $about = About::findOrFail(1); // Assuming you're updating the data of a specific entry, adjust the ID accordingly
    //         $about->quality = $quality;
    //         $about->uniform_product = $uniform;
    //         $about->satisfaction = $satisfaction;
    //         $about->mission = $mission;
    //         $about->save();

    //         // Return success response
    //         return response()->json([
    //             'message' => 'Data updated successfully',
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // //counters

    // public function updatedcounters(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'clients' => 'required|string',
    //         'projects' => 'required|string',
    //         'hard_workers' => 'required|string',
    //     ]);

    //     try {
    //         // Get the data from the request
    //         $happyClients = $request->input('clients');
    //         $projects = $request->input('projects');
    //         $hardWorkers = $request->input('hard_workers');


    //         // Update the counters data in the database
    //         $counters = About::findOrFail(1); // Assuming you're updating the data of a specific entry, adjust the ID accordingly
    //         $counters->happy_clients = $happyClients;
    //         $counters->projects = $projects;
    //         $counters->hard_workers = $hardWorkers;
    //         $counters->save();

    //         // Return success response
    //         return response()->json([
    //             'message' => 'Data updated successfully',
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    // //section1 about

    // public function updatedsectioncontent1(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'content' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $content = $request->input('content');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $about = About::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $about->about_content1 = $content;
    //         $about->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $about->content,
    //             'message' => 'Content updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
    // public function updatedsectionimage1(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('about_image1')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->about_image1;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/img/' . $oldImage))) {
    //             File::delete(public_path('assets/img/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('about_image1')->getClientOriginalName();
    //         $request->file('about_image1')->move(public_path('assets/img/'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['about_image1' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/img/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // public function updatedsectioncontent2(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'content' => 'required|string', // Add any other validation rules you need here
    //     ]);
    //     try {
    //         // Get the title from the request
    //         $content = $request->input('content');

    //         // Update the title in the database (assuming 'Thought' model has 'title' attribute)
    //         $about = About::findOrFail(1); // Assuming you're updating the title of a specific thought, adjust the ID accordingly
    //         $about->about_content2 = $content;
    //         $about->save();

    //         // Return success response
    //         return response()->json([
    //             'title' => $about->content,
    //             'message' => 'Content updated successfully'
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return error response if any exception occurs
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
    // public function updatedsectionimage2(Request $request)
    // {
    //     // Check if a file is uploaded
    //     if ($request->hasFile('about_image2')) {
    //         // Get the old image filename from the database
    //         $oldImage = About::first()->about_image2;

    //         // Delete the old image if it exists
    //         if ($oldImage && File::exists(public_path('assets/img/' . $oldImage))) {
    //             File::delete(public_path('assets/img/' . $oldImage));
    //         }

    //         // Upload the new image
    //         $fileName = $request->file('about_image2')->getClientOriginalName();
    //         $request->file('about_image2')->move(public_path('assets/img/'), $fileName);

    //         // Update the database with the new image filename
    //         About::first()->update(['about_image2' => $fileName]);

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/img/' . $fileName),
    //             'message' => 'Image updated successfully'
    //         ], 200);
    //     }

    //     // If no file is uploaded, return error response
    //     return response()->json([
    //         'message' => 'No image uploaded'
    //     ], 400);
    // }

    // //gallery

    // public function galleryimages()
    // {
    //     $data = Galleryimages::all();
    //     return view('admin.gallery-images', compact('data'));
    // }

    // public function editgalleryimages($id)
    // {
    //     $data = Galleryimages::findOrFail($id);
    //     return view('admin.edit-gallery-images', compact('data'));
    // }

    // public function updategalleryimages(Request $request)
    // {

    //     // Validate incoming request
    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow image field to be nullable
    //         'text' => 'nullable|string', // Allow text field to be nullable
    //     ]);

    //     // Check if either image or text is present
    //     if ($request->hasFile('image') || $request->filled('text')) {
    //         // Check if a file is uploaded
    //         if ($request->hasFile('image')) {
    //             // Get the old image filename from the database
    //             $oldImage = $request->input('old_image'); // Assuming you're passing the old image name in the form

    //             // Delete the old image if it exists
    //             if ($oldImage && File::exists(public_path('assets/images/Gallery/' . $oldImage))) {
    //                 File::delete(public_path('assets/images/Gallery/' . $oldImage));
    //             }

    //             // Upload the new image
    //             $fileName = $request->file('image')->getClientOriginalName();
    //             $request->file('image')->move(public_path('assets/images/Gallery/'), $fileName);
    //         } else {
    //             // If no new image uploaded, keep the old image filename
    //             $fileName = $request->input('old_image');
    //         }

    //         // Update the database with the new image filename and/or text
    //         // You might need to adjust this based on your actual model structure
    //         $gallery = Galleryimages::findOrFail($request->input('image_id'));
    //         if ($request->hasFile('image')) {
    //             $gallery->img = $fileName;
    //         }
    //         if ($request->filled('text')) {
    //             $gallery->text = $request->input('text');
    //         }
    //         $gallery->save();

    //         // Return success response
    //         return response()->json([
    //             'image_url' => asset('assets/images/Gallery/' . $fileName),
    //             'message' => 'Gallery updated successfully'
    //         ], 200);
    //     }

    //     // If neither image nor text is provided, return error response
    //     return response()->json([
    //         'message' => 'No image or text provided'
    //     ], 400);
    // }

    // public function deletegalleryimages($id)
    // {
    //     try {
    //         // Find the gallery image record by its ID
    //         $gallery = Galleryimages::findOrFail($id);

    //         // Delete the gallery image record
    //         $gallery->delete();

    //         // Return success response with redirect URL
    //         return redirect()->route('gallery-images')->with('success', 'Gallery image deleted successfully');
    //     } catch (\Exception $e) {
    //         // Return error response if deletion fails
    //         return redirect()->route('gallery-images')->with('error', 'Failed to delete gallery image');
    //     }
    // }

    // public function addgalleryimages()
    // {
    //     return view('admin.add-gallery-images');
    // }

    // public function addedgalleryimages(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Check if files are uploaded
    //     if ($request->hasFile('images')) {
    //         $imageUrls = [];

    //         // Iterate over each uploaded image
    //         foreach ($request->file('images') as $image) {
    //             // Upload the new image
    //             $fileName = $image->getClientOriginalName();
    //             $image->move(public_path('assets/img/gallery/'), $fileName);

    //             // Create a new gallery entry
    //             $gallery = new Galleryimages();
    //             $gallery->image = $fileName;
    //             $gallery->save();

    //             // Store the URL of the uploaded image
    //             $imageUrls[] = asset('assets/img/gallery/' . $fileName);
    //         }

    //         // Return success response with image URLs
    //         return response()->json([
    //             'image_urls' => $imageUrls,
    //             'message' => 'Gallery images added successfully'
    //         ], 200);
    //     }

    //     // If no files are uploaded, return error response
    //     return response()->json([
    //         'message' => 'No images uploaded'
    //     ], 400);
    // }

    // //video

    // public function video()
    // {
    //     $data = Video::all();

    //     return view('admin.video', compact('data'));
    // }

    // public function editvideo($id)
    // {
    //     $data = Video::findOrFail($id);
    //     return view('admin.edit-video', compact('data'));
    // }

    // public function updatevideo(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'video' => 'required|string', // Validate YouTube URL
    //         // Add any other validation rules you need here
    //     ]);

    //     // Get the ID of the video to update
    //     $videoId = $request->input('id');

    //     // Find the video record by its ID
    //     $video = Video::findOrFail($videoId);

    //     // Update the video URL in the database
    //     $video->video = $request->input('video');

    //     // Save the changes
    //     $video->save();

    //     // Return success response
    //     return response()->json([
    //         'video' => $video->video,
    //         'message' => 'Video updated successfully'
    //     ], 200);
    // }
    // public function deletevideo($id)
    // {
    //     // Find the international journey record by its ID
    //     $video = Video::findOrFail($id);

    //     // Delete the journey record
    //     $video->delete();

    //     // You can optionally return a response here, such as a success message or redirecting the user
    //     return response()->json([
    //         'message' => 'Video deleted successfully'
    //     ], 200);
    // }

    // public function addvideo()
    // {
    //     return view('admin.add-video');
    // }

    // public function addedvideo(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'video' => 'required|file|mimes:mp4,mov,avi,wmv', // Adjust file types as needed
    //     ]);

    //     // Check if a video file is provided
    //     if ($request->hasFile('video')) {
    //         // Retrieve the uploaded file
    //         $videoFile = $request->file('video');

    //         // Get the original file name of the uploaded video file
    //         $videoName = $videoFile->getClientOriginalName();

    //         // Move the uploaded file to the desired directory using its original name
    //         $videoFile->move(public_path('assets/img'), $videoName);

    //         // Create a new video entry
    //         $video = new Video();
    //         $video->video = $videoName; // Store the file path in the database

    //         $video->save();

    //         // Return success response
    //         return response()->json([
    //             'video' => $video->video, // You can return the video path if needed
    //             'message' => 'Video added successfully'
    //         ], 200);
    //     }

    //     // If no video file is provided, return error response
    //     return response()->json([
    //         'message' => 'No video file provided'
    //     ], 400);
    // }

    // //blog

    // public function blog()
    // {
    //     $data = Blog::all();

    //     return view('admin.blog', compact('data'));
    // }

    // public function updateblog(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'video' => 'required|string', // Validate YouTube URL
    //         // Add any other validation rules you need here
    //     ]);

    //     // Get the ID of the video to update
    //     $videoId = $request->input('id');

    //     // Find the video record by its ID
    //     $video = Blog::findOrFail($videoId);

    //     // Update the video URL in the database
    //     $video->video = $request->input('video');

    //     // Save the changes
    //     $video->save();

    //     // Return success response
    //     return response()->json([
    //         'video' => $video->video,
    //         'message' => 'Video updated successfully'
    //     ], 200);
    // }

    // public function deleteblog($id)
    // {
    //     // Find the international journey record by its ID
    //     $video = Blog::findOrFail($id);

    //     // Delete the journey record
    //     $video->delete();

    //     // You can optionally return a response here, such as a success message or redirecting the user
    //     return response()->json([
    //         'message' => 'Blog Video deleted successfully'
    //     ], 200);
    // }

    // public function addblog()
    // {
    //     return view('admin.add-blog');
    // }

    // public function addedblog(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'video' => 'required|file|mimes:mp4,mov,avi,wmv', // Adjust file types as needed
    //     ]);

    //     // Check if a video file is provided
    //     if ($request->hasFile('video')) {
    //         // Retrieve the uploaded file
    //         $videoFile = $request->file('video');

    //         // Get the original file name of the uploaded video file
    //         $videoName = $videoFile->getClientOriginalName();

    //         // Move the uploaded file to the desired directory using its original name
    //         $videoFile->move(public_path('assets/img'), $videoName);

    //         // Create a new video entry
    //         $video = new Blog();
    //         $video->video = $videoName; // Store the file path in the database

    //         $video->save();

    //         // Return success response
    //         return response()->json([
    //             'video' => $video->video, // You can return the video path if needed
    //             'message' => 'Video added successfully'
    //         ], 200);
    //     }

    //     // If no video file is provided, return error response
    //     return response()->json([
    //         'message' => 'No video file provided'
    //     ], 400);
    // }

    // //csr

    // public function csr()
    // {
    //     $data = CSR::first();
    //     return view('admin.csr', compact('data'));
    // }

    // public function updatecsr(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'csrimage' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Adjust validation rules as needed
    //         'content' => 'required|string',
    //     ]);

    //     // Find the existing CSR record
    //     $csr = CSR::findOrFail(1);

    //     // Check if a new image file is provided
    //     if ($request->hasFile('csrimage')) {
    //         // Validate and process the new image file
    //         $image = $request->file('csrimage');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $image->move(public_path('assets/img'), $imageName);

    //         // Remove old image if exists
    //         if ($csr->image && file_exists(public_path($csr->image))) {
    //             unlink(public_path($csr->image));
    //         }

    //         // Update image field with the new image path
    //         $csr->image = 'assets/img/' . $imageName;
    //     }

    //     // Update content field
    //     $csr->content = $request->input('content');

    //     // Save the updated CSR record
    //     $csr->save();

    //     // Return success response
    //     return response()->json([
    //         'message' => 'CSR updated successfully'
    //     ], 200);
    // }


    // public function subcategory()
    // {
    //     $data = SubCategory::all();
    //     return view('admin.sub-category', compact('data'));
    // }

    // public function addsubcategory()
    // {
    //     $categories = Category::all();
    //     return view('admin.add-subcategory', compact('categories'));
    // }

    // public function addproduct()
    // {
    //     $categories = Category::all();
    //     $subcategories = Subcategory::all();
    //     return view('admin.add-product', compact('categories', 'subcategories'));
    // }

    // public function addedsubcategory(Request $request)
    // {
    //     // Validate incoming request
    //     $request->validate([
    //         'category' => 'integer',
    //         'subcategory' => 'required|string',
    //     ]);

    //     // Check if category name is provided
    //     if ($request->has('subcategory')) {
    //         // Retrieve the category name
    //         $categoryName = $request->input('category');
    //         $subcategoryName = $request->input('subcategory');

    //         // Create a new category entry
    //         $subcategory = new Subcategory();
    //         $subcategory->sub_cat_name = $subcategoryName; // Store the category name in the database
    //         $subcategory->cat_id = $categoryName;

    //         $subcategory->save();

    //         // Return success response
    //         return response()->json([
    //             'subcategory' => $subcategory->sub_cat_name, // You can return the category name if needed
    //             'message' => 'Sub Category added successfully'
    //         ], 200);
    //     }

    //     // If no category name is provided, return error response
    //     return response()->json([
    //         'message' => 'No sub category name provided'
    //     ], 400);
    // }

    // public function deletesubcategory($id)
    // {
    //     // Find the career record by its ID
    //     $subcategory = Subcategory::findOrFail($id);

    //     // Delete the career record
    //     $subcategory->delete();

    //     // Flash the success message to the session
    //     session()->flash('success', 'Sub Category deleted successfully');

    //     // Redirect back to the previous page or any desired route
    //     return redirect()->back();
    // }


}
