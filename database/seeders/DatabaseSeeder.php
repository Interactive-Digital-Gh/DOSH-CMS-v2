<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // ── 1. Users ──────────────────────────────────────────────
        $userId = DB::table('users')->insertGetId([
            'name'              => 'Admin User',
            'email'             => 'admin@dosh.com',
            'email_verified_at' => $now,
            'password'          => Hash::make('password123'),

            'created_at'        => $now,
            'updated_at'        => $now,
        ]);

        DB::table('users')->insert([
            'name'              => 'Content Editor',
            'email'             => 'editor@dosh.com',
            'email_verified_at' => $now,
            'password'          => Hash::make('password123'),

            'created_at'        => $now,
            'updated_at'        => $now,
        ]);

        // ── 2. Slideshows ─────────────────────────────────────────
        $slides = [
            ['caption' => 'Protecting What Matters Most',   'body' => 'Comprehensive insurance solutions tailored to your needs. Trust DOSH to safeguard your future.'],
            ['caption' => 'Your Health, Our Priority',      'body' => 'Access quality healthcare with our extensive network of service providers across the country.'],
            ['caption' => 'Peace of Mind, Guaranteed',      'body' => 'From life insurance to property cover, we provide the security you deserve.'],
        ];
        foreach ($slides as $i => $s) {
            DB::table('slideshows')->insert([
                'slideshow_image'        => 'slideshows/slide_' . ($i + 1) . '.jpg',
                'mobile_slideshow_image'  => 'slideshows/slide_mobile_' . ($i + 1) . '.jpg',
                'caption'    => $s['caption'],
                'body'       => $s['body'],
                'uploaded_by'=> 'Admin User',
                'published'  => '1',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // ── 3. Home Sections ──────────────────────────────────────
        DB::table('home_sections')->insert([
            'insurance_image'       => 'home/insurance.jpg',
            'insurance_caption'     => 'Insurance Solutions',
            'insurance_body'        => 'We offer a wide range of insurance products designed to protect individuals, families, and businesses against unforeseen risks.',
            'insurance_modal_body'  => 'Our insurance division provides comprehensive coverage including life, health, motor, property, and travel insurance. We work with leading underwriters to ensure you get the best protection at competitive rates.',
            'finance_image'         => 'home/finance.jpg',
            'finance_caption'       => 'Financial Services',
            'finance_body'          => 'Our financial advisory services help you make informed decisions about savings, investments, and wealth management.',
            'finance_modal_body'    => 'From retirement planning to investment portfolios, our certified financial advisors guide you every step of the way.',
            'ride_image'            => 'home/ride.jpg',
            'ride_caption'          => 'Ride Services',
            'ride_body'             => 'Experience safe and reliable transportation services with our network of vetted drivers and modern vehicles.',
            'ride_modal_body'       => 'Our ride-hailing platform connects you with professional drivers for daily commutes, airport transfers, and corporate travel.',
            'erp_image'             => 'home/erp.jpg',
            'erp_caption'           => 'Enterprise Solutions',
            'erp_body'              => 'Streamline your business operations with our enterprise resource planning solutions built for African businesses.',
            'erp_modal_body'        => 'Our ERP solutions cover HR management, payroll, inventory, accounting, and supply chain management in one integrated platform.',
            'commerce_image'        => 'home/commerce.jpg',
            'commerce_caption'      => 'E-Commerce Platform',
            'commerce_body'         => 'Discover a marketplace that connects buyers and sellers across the region with secure payment processing.',
            'commerce_modal_body'   => 'Our e-commerce ecosystem supports local merchants with digital storefronts, logistics integration, and mobile money payments.',
            'risk_image'            => 'home/risk.jpg',
            'risk_caption'          => 'Risk Management',
            'risk_body'             => 'Identify, assess, and mitigate business risks with our professional risk management consulting services.',
            'risk_modal_body'       => 'We provide enterprise risk assessments, compliance audits, and bespoke risk mitigation strategies for organizations of all sizes.',
            'created_at'            => $now,
            'updated_at'            => $now,
        ]);

        // ── 4. About Us ──────────────────────────────────────────
        DB::table('aboutus')->insert([
            'aboutus_header_image' => 'about/header.jpg',
            'who_we_are_image'     => 'about/who_we_are.jpg',
            'who_we_are_caption'   => 'Who We Are',
            'who_we_are_header'    => 'A Leading Insurance & Financial Services Company',
            'who_we_are_body'      => 'DOSH is a premier insurance and financial services company committed to delivering innovative solutions across Africa. Founded with the mission to make insurance accessible and affordable, we have grown into a trusted brand serving thousands of customers.',
            'mission_image'        => 'about/mission.jpg',
            'mission_caption'      => 'Our Mission',
            'mission_body'         => 'To provide accessible, affordable, and reliable insurance and financial services that empower individuals and businesses to thrive with confidence and security.',
            'values_image'         => 'about/values.jpg',
            'values_caption'       => 'Our Values',
            'values_body'          => 'Integrity, Innovation, Customer-Centricity, Excellence, and Teamwork form the foundation of everything we do. We believe in transparency, accountability, and delivering on our promises.',
            'expertise_caption'    => 'Our Expertise',
            'expertise_body'       => 'With over a decade of experience in the insurance industry, our team of certified professionals brings deep knowledge in underwriting, claims management, risk assessment, and financial planning.',
            'inspiration_caption'  => 'Our Inspiration',
            'inspiration_body'     => 'We are inspired by the resilience of the communities we serve. Every policy issued and every claim settled represents a family protected and a future secured.',
            'banner_image'         => 'about/banner.jpg',
            'created_at'           => $now,
            'updated_at'           => $now,
        ]);

        // ── 5. DOSH Insurance Products ────────────────────────────
        $insurances = [
            ['name' => 'Life Insurance',     'type' => 'individual', 'caption' => 'Secure Your Family\'s Future',      'body' => 'Our life insurance plans provide financial protection for your loved ones.', 'desc' => 'Comprehensive life insurance coverage including term life, whole life, and endowment plans. Benefits include death benefits, maturity benefits, and optional riders for critical illness and disability.'],
            ['name' => 'Health Insurance',   'type' => 'individual', 'caption' => 'Quality Healthcare Coverage',       'body' => 'Access quality healthcare without worrying about costs.',                  'desc' => 'Health insurance plans covering outpatient, inpatient, dental, and optical care. Choose from individual, family, or corporate plans with access to our nationwide network of hospitals and clinics.'],
            ['name' => 'Motor Insurance',    'type' => 'general',    'caption' => 'Drive With Confidence',              'body' => 'Protect your vehicle with comprehensive motor insurance.',                 'desc' => 'Full comprehensive, third party fire & theft, and third party only motor insurance. Includes roadside assistance, windscreen cover, and personal accident benefits.'],
            ['name' => 'Property Insurance', 'type' => 'general',    'caption' => 'Safeguard Your Property',            'body' => 'Protect your home and business property against risks.',                  'desc' => 'Coverage for buildings, contents, and stock against fire, theft, natural disasters, and other perils. Available for residential and commercial properties.'],
            ['name' => 'Travel Insurance',   'type' => 'individual', 'caption' => 'Travel Worry-Free',                  'body' => 'Enjoy your travels with comprehensive coverage.',                         'desc' => 'Travel insurance covering medical emergencies, trip cancellation, lost baggage, flight delays, and personal liability. Available for single trips and annual multi-trip plans.'],
        ];
        foreach ($insurances as $i => $ins) {
            DB::table('dosh_insurance')->insert([
                'home_image'      => 'insurance/home_' . ($i + 1) . '.jpg',
                'home_caption'    => $ins['caption'],
                'home_body'       => $ins['body'],
                'insurance_name'  => $ins['name'],
                'insurance_type'  => $ins['type'],
                'image'           => 'insurance/' . strtolower(str_replace(' ', '_', $ins['name'])) . '.jpg',
                'desc'            => $ins['desc'],
                'created_at'      => $now,
                'updated_at'      => $now,
            ]);
        }

        // ── 6. Insurance Read More Modals ─────────────────────────
        foreach ($insurances as $ins) {
            DB::table('insurance_readmore_modal')->insert([
                'image'          => 'insurance/modal_' . strtolower(str_replace(' ', '_', $ins['name'])) . '.jpg',
                'description'    => $ins['desc'] . ' Contact us today to get a personalized quote and learn more about our coverage options.',
                'references'     => 'National Insurance Commission (NIC) Guidelines, DOSH Insurance Policy Document v2.0',
                'insurance_name' => $ins['name'],
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);
        }

        // ── 7. PnS Header ────────────────────────────────────────
        DB::table('pns_header')->insert([
            'image'      => 'pns/header.jpg',
            'caption'    => 'Products & Services',
            'body'       => 'Explore our comprehensive range of insurance and financial products designed to meet your unique needs.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // ── 8. PnS Page ──────────────────────────────────────────
        DB::table('pns_page')->insert([
            'header_image'   => 'pns/page_header.jpg',
            'header_caption' => 'Our Products & Services',
            'header_body'    => 'From insurance to financial advisory, we offer solutions that protect and grow your wealth.',
            'pns-video'      => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'video_caption'  => 'Why Choose DOSH Insurance?',
            'video_desc'     => 'Watch our short video to learn how DOSH Insurance is transforming the insurance landscape with innovative, customer-first solutions.',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);

        // ── 9. PnS Video Section ─────────────────────────────────
        DB::table('pns_video_section')->insert([
            'video_url'         => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'video_title'       => 'DOSH Insurance – Your Trusted Partner',
            'video_subtitle'    => 'Protecting What Matters Most',
            'video_description' => 'Learn about our comprehensive range of insurance products and how we are making insurance accessible to everyone across Africa.',
            'created_at'        => $now,
            'updated_at'        => $now,
        ]);

        // ── 10. Contact Page ─────────────────────────────────────
        DB::table('contact_page')->insert([
            'header_image'   => 'contact/header.jpg',
            'header_caption' => 'Get In Touch',
            'section_image'  => 'contact/section.jpg',
            'header_body'    => 'We would love to hear from you. Reach out to us for inquiries, support, or partnership opportunities.',
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);

        // ── 11. Privacy Statement ─────────────────────────────────
        DB::table('privacy_statement')->insert([
            'privacy_statement' => 'DOSH Insurance is committed to protecting your personal information. We collect and process data in accordance with the Data Protection Act. Your information is used solely for providing and improving our services, processing claims, and communicating important updates. We implement industry-standard security measures to safeguard your data. You have the right to access, correct, or delete your personal information at any time by contacting our Data Protection Officer at privacy@dosh.com.',
            'created_at'        => $now,
            'updated_at'        => $now,
        ]);

        // ── 12. Service Providers Header ──────────────────────────
        DB::table('service_providers_header')->insert([
            'image'      => 'service_providers/header.jpg',
            'caption'    => 'Our Service Providers',
            'body'       => 'We partner with the best healthcare facilities across the country to ensure you receive quality care when you need it most.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // ── 13. Service Providers Titles ──────────────────────────
        DB::table('service_providers_titles')->insert([
            'title'      => 'Healthcare Service Providers',
            'sub_title'  => 'Find a hospital or clinic near you from our extensive network of accredited healthcare providers.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // ── 14. HSP (Healthcare Service Providers) ────────────────
        $hospitals = [
            ['name' => 'Korle Bu Teaching Hospital',            'region' => 'Greater Accra',  'district' => 'Accra Metropolis',    'phone' => '+233302665401', 'email' => 'info@kbth.gov.gh',           'lat' => '5.5340', 'lng' => '-0.2254', 'address' => 'Guggisberg Ave, Accra'],
            ['name' => 'Komfo Anokye Teaching Hospital',        'region' => 'Ashanti',        'district' => 'Kumasi Metropolis',   'phone' => '+233322022301', 'email' => 'info@kath.gov.gh',           'lat' => '6.6940', 'lng' => '-1.6260', 'address' => 'Bantama, Kumasi'],
            ['name' => 'Ridge Hospital',                        'region' => 'Greater Accra',  'district' => 'Accra Metropolis',    'phone' => '+233302228411', 'email' => 'info@ridgehospital.gov.gh',  'lat' => '5.5620', 'lng' => '-0.1960', 'address' => 'Castle Road, Accra'],
            ['name' => '37 Military Hospital',                  'region' => 'Greater Accra',  'district' => 'Accra Metropolis',    'phone' => '+233302776111', 'email' => 'info@37milhosp.gov.gh',      'lat' => '5.5850', 'lng' => '-0.1870', 'address' => 'Liberation Road, Accra'],
            ['name' => 'Cape Coast Teaching Hospital',           'region' => 'Central',        'district' => 'Cape Coast Metropolis','phone' => '+233332132264', 'email' => 'info@ccth.gov.gh',          'lat' => '5.1090', 'lng' => '-1.2470', 'address' => 'Interberton, Cape Coast'],
            ['name' => 'Tamale Teaching Hospital',               'region' => 'Northern',       'district' => 'Tamale Metropolis',   'phone' => '+233372022455', 'email' => 'info@tth.gov.gh',            'lat' => '9.4075', 'lng' => '-0.8393', 'address' => 'Hospital Road, Tamale'],
            ['name' => 'Nyaho Medical Centre',                   'region' => 'Greater Accra',  'district' => 'Accra Metropolis',    'phone' => '+233302775341', 'email' => 'info@nyahomedical.com',      'lat' => '5.5770', 'lng' => '-0.1840', 'address' => 'Airport Residential Area, Accra'],
            ['name' => 'Lister Hospital & Fertility Centre',     'region' => 'Greater Accra',  'district' => 'Accra Metropolis',    'phone' => '+233302812325', 'email' => 'info@listerhospital.com.gh', 'lat' => '5.6050', 'lng' => '-0.1870', 'address' => 'North Airport, Accra'],
            ['name' => 'Trust Hospital',                         'region' => 'Greater Accra',  'district' => 'Accra Metropolis',    'phone' => '+233302761974', 'email' => 'info@trusthospitals.com',    'lat' => '5.5590', 'lng' => '-0.2050', 'address' => 'Osu Badu Street, Accra'],
            ['name' => 'Holy Trinity Medical Centre',            'region' => 'Greater Accra',  'district' => 'Tema Metropolis',     'phone' => '+233303204000', 'email' => 'info@htmc.com.gh',           'lat' => '5.6698', 'lng' => '-0.0166', 'address' => 'Community 9, Tema'],
        ];
        foreach ($hospitals as $h) {
            DB::table('hsp')->insert([
                'hospital_name'    => $h['name'],
                'country'          => 'Ghana',
                'region_name'      => $h['region'],
                'district'         => $h['district'],
                'phone_number1'    => $h['phone'],
                'phone_number2'    => null,
                'phone_number3'    => null,
                'email'            => $h['email'],
                'latitude'         => $h['lat'],
                'longitude'        => $h['lng'],
                'location_address' => $h['address'],
                'created_at'       => $now,
                'updated_at'       => $now,
            ]);
        }

        // ── 15. Action Log ────────────────────────────────────────
        $actions = [
            ['action' => 'Created new slideshow entry',          'db' => 'slideshows'],
            ['action' => 'Updated About Us content',             'db' => 'aboutus'],
            ['action' => 'Added new insurance product',          'db' => 'dosh_insurance'],
            ['action' => 'Updated contact page header image',    'db' => 'contact_page'],
            ['action' => 'Published slideshow #2',               'db' => 'slideshows'],
        ];
        foreach ($actions as $a) {
            DB::table('action_log')->insert([
                'user_name'         => 'Admin User',
                'user_level'        => 'Administrator',
                'user_action'       => $a['action'],
                'database_affected' => $a['db'],
                'created_at'        => $now,
                'updated_at'        => $now,
            ]);
        }

        // ── 16. Page Visits ───────────────────────────────────────
        $pages = ['/', '/about', '/products', '/contact', '/insurance/life', '/insurance/health', '/service-providers'];
        $agents = [
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 Chrome/120.0',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 17_0) AppleWebKit/605.1.15 Mobile Safari/604.1',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/119.0',
        ];
        for ($i = 0; $i < 25; $i++) {
            DB::table('page_visits')->insert([
                'page_url'   => $pages[array_rand($pages)],
                'referer'    => $i % 3 === 0 ? 'https://www.google.com' : null,
                'user_ip'    => '192.168.1.' . rand(1, 254),
                'user_agent' => $agents[array_rand($agents)],
                'created_at' => $now->copy()->subDays(rand(0, 30)),
                'updated_at' => $now,
            ]);
        }

        // ── 17. User Activities ───────────────────────────────────
        $activities = [
            'Logged in', 'Updated slideshow', 'Changed password',
            'Updated About Us page', 'Added insurance product',
            'Viewed dashboard', 'Exported analytics report',
        ];
        foreach ($activities as $act) {
            DB::table('user_activities')->insert([
                'user_id'    => $userId,
                'activity'   => $act,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
                'created_at' => $now->copy()->subHours(rand(1, 168)),
                'updated_at' => $now,
            ]);
        }
    }
}
