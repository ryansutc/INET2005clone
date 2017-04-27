<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'art_name' => 'Roommate Story',
            'art_title' => 'The Fridge Food Didnt Have Your Name on it',
            'art_desc' => 'Human Interest Story about Roommates, how they are awful and eat your last Joe Louis',
            'all_pages' => 0,
            'page_id' => 1,
            'cont_id' => 3,
            'art_text' => ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Curabitur vitae turpis ut erat gravida eleifend. Nulla facilisi. Vivamus non aliquam nisi. 
            Sed ut nibh eget enim luctus dapibus. Quisque eget felis sed ligula fringilla consequat. 
            Nam lacinia ligula enim, ac rhoncus velit malesuada quis. Mauris non imperdiet sem, sed 
            interdum ligula. Fusce enim diam, faucibus in tellus et, vulputate tempus justo. Curabitur 
            et lorem non massa porta dignissim. Sed venenatis cursus tellus et commodo. Etiam a euismod 
            lectus. Aenean urna justo, rutrum ut fringilla ut, convallis eu tellus. Sed interdum vitae 
            lorem vel suscipit. Integer suscipit nunc eu arcu finibus venenatis.</p>

            <p>Aliquam pharetra molestie diam eget tincidunt. 
            In hac habitasse platea dictumst. Donec est dolor, vehicula a rhoncus interdum, 
            sodales sed lacus. Vestibulum leo erat, aliquam quis rutrum sit amet, cursus sed ex. 
            Proin a fermentum leo. Curabitur lacinia tellus nec felis consectetur vehicula. Proin 
            finibus placerat sagittis</p>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

        DB::table('articles')->insert([
            'art_name' => 'Teachers Strike',
            'art_title' => 'Teachers Go on Strike, Parents Freak Out',
            'art_desc' => 'Local Story about Schools, teachers, unions and the dispicable Stephen McNeil',
            'all_pages' => 0,
            'page_id' => 1,
            'cont_id' => 1,
            'art_text' => ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Curabitur vitae turpis ut erat gravida eleifend. Nulla facilisi. Vivamus non aliquam nisi. 
            Sed ut nibh eget enim luctus dapibus. Quisque eget felis sed ligula fringilla consequat. 
            Nam lacinia ligula enim, ac rhoncus velit malesuada quis. Mauris non imperdiet sem, sed 
            interdum ligula. Fusce enim diam, faucibus in tellus et, vulputate tempus justo. Curabitur 
            et lorem non massa porta dignissim. Sed venenatis cursus tellus et commodo. Etiam a euismod 
            lectus. Aenean urna justo, rutrum ut fringilla ut, convallis eu tellus. Sed interdum vitae 
            lorem vel suscipit. Integer suscipit nunc eu arcu finibus venenatis.</p>

            <p>Aliquam pharetra molestie diam eget tincidunt. 
            In hac habitasse platea dictumst. Donec est dolor, vehicula a rhoncus interdum, 
            sodales sed lacus. Vestibulum leo erat, aliquam quis rutrum sit amet, cursus sed ex. 
            Proin a fermentum leo. Curabitur lacinia tellus nec felis consectetur vehicula. Proin 
            finibus placerat sagittis</p>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

        DB::table('articles')->insert([
            'art_name' => 'The Uncomfortable Chair Story',
            'art_title' => 'The chairs at NSCC are Uncomfortable',
            'art_desc' => 'Local Story about NSCC',
            'all_pages' => 0,
            'page_id' => 2,
            'cont_id' => 1,
            'art_text' => ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Curabitur vitae turpis ut erat gravida eleifend. Nulla facilisi. Vivamus non aliquam nisi. 
            Sed ut nibh eget enim luctus dapibus. Quisque eget felis sed ligula fringilla consequat. 
            Nam lacinia ligula enim, ac rhoncus velit malesuada quis. Mauris non imperdiet sem, sed 
            interdum ligula. Fusce enim diam, faucibus in tellus et, vulputate tempus justo. Curabitur 
            et lorem non massa porta dignissim. Sed venenatis cursus tellus et commodo. Etiam a euismod 
            lectus. Aenean urna justo, rutrum ut fringilla ut, convallis eu tellus. Sed interdum vitae 
            lorem vel suscipit. Integer suscipit nunc eu arcu finibus venenatis.</p>

            <p>Aliquam pharetra molestie diam eget tincidunt. 
            In hac habitasse platea dictumst. Donec est dolor, vehicula a rhoncus interdum, 
            sodales sed lacus. Vestibulum leo erat, aliquam quis rutrum sit amet, cursus sed ex. 
            Proin a fermentum leo. Curabitur lacinia tellus nec felis consectetur vehicula. Proin 
            finibus placerat sagittis</p>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

        DB::table('articles')->insert([
            'art_name' => 'Big World Story',
            'art_title' => 'Something Important Happened Does it Really Affect Me?',
            'art_desc' => 'An Important Headline Story, that you scan and should read but really, well, naah. Wheres the Royals gossip?',
            'all_pages' => 0,
            'page_id' => 3,
            'cont_id' => 2,
            'art_text' => ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Curabitur vitae turpis ut erat gravida eleifend. Nulla facilisi. Vivamus non aliquam nisi. 
            Sed ut nibh eget enim luctus dapibus. Quisque eget felis sed ligula fringilla consequat. 
            Nam lacinia ligula enim, ac rhoncus velit malesuada quis. Mauris non imperdiet sem, sed 
            interdum ligula. Fusce enim diam, faucibus in tellus et, vulputate tempus justo. Curabitur 
            et lorem non massa porta dignissim. Sed venenatis cursus tellus et commodo. Etiam a euismod 
            lectus. Aenean urna justo, rutrum ut fringilla ut, convallis eu tellus. Sed interdum vitae 
            lorem vel suscipit. Integer suscipit nunc eu arcu finibus venenatis.</p>

            <p>Aliquam pharetra molestie diam eget tincidunt. 
            In hac habitasse platea dictumst. Donec est dolor, vehicula a rhoncus interdum, 
            sodales sed lacus. Vestibulum leo erat, aliquam quis rutrum sit amet, cursus sed ex. 
            Proin a fermentum leo. Curabitur lacinia tellus nec felis consectetur vehicula. Proin 
            finibus placerat sagittis</p>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

        DB::table('articles')->insert([
            'art_name' => 'Local Story about NSCC Again',
            'art_title' => 'But Really, these Chairs are Terrible',
            'art_desc' => 'The chairs are so bad, that it is like the school wants you to develop back problems so 
                            their chiropracter students have lots of work',
            'all_pages' => 0,
            'page_id' => 3,
            'cont_id' => 2,
            'art_text' => ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Curabitur vitae turpis ut erat gravida eleifend. Nulla facilisi. Vivamus non aliquam nisi. 
            Sed ut nibh eget enim luctus dapibus. Quisque eget felis sed ligula fringilla consequat. 
            Nam lacinia ligula enim, ac rhoncus velit malesuada quis. Mauris non imperdiet sem, sed 
            interdum ligula. Fusce enim diam, faucibus in tellus et, vulputate tempus justo. Curabitur 
            et lorem non massa porta dignissim. Sed venenatis cursus tellus et commodo. Etiam a euismod 
            lectus. Aenean urna justo, rutrum ut fringilla ut, convallis eu tellus. Sed interdum vitae 
            lorem vel suscipit. Integer suscipit nunc eu arcu finibus venenatis.</p>

            <p>Aliquam pharetra molestie diam eget tincidunt. 
            In hac habitasse platea dictumst. Donec est dolor, vehicula a rhoncus interdum, 
            sodales sed lacus. Vestibulum leo erat, aliquam quis rutrum sit amet, cursus sed ex. 
            Proin a fermentum leo. Curabitur lacinia tellus nec felis consectetur vehicula. Proin 
            finibus placerat sagittis</p>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

        DB::table('articles')->insert([
            'art_name' => 'Cat Videos',
            'art_title' => 'Cat Videos are Officially the Biggest Thing on the Internet',
            'art_desc' => 'Cat Videos have overtaken porn as the biggest traffic producer according to analytics 
            IBM Watson, narrowly beating out Porn.',
            'all_pages' => 1,
            'page_id' => 3,
            'cont_id' => 3,
            'art_text' => ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Curabitur vitae turpis ut erat gravida eleifend. Nulla facilisi. Vivamus non aliquam nisi. 
            Sed ut nibh eget enim luctus dapibus. Quisque eget felis sed ligula fringilla consequat. 
            Nam lacinia ligula enim, ac rhoncus velit malesuada quis. Mauris non imperdiet sem, sed 
            interdum ligula. Fusce enim diam, faucibus in tellus et, vulputate tempus justo. Curabitur 
            et lorem non massa porta dignissim. Sed venenatis cursus tellus et commodo. Etiam a euismod 
            lectus. Aenean urna justo, rutrum ut fringilla ut, convallis eu tellus. Sed interdum vitae 
            lorem vel suscipit. Integer suscipit nunc eu arcu finibus venenatis.</p>

            <p>Aliquam pharetra molestie diam eget tincidunt. 
            In hac habitasse platea dictumst. Donec est dolor, vehicula a rhoncus interdum, 
            sodales sed lacus. Vestibulum leo erat, aliquam quis rutrum sit amet, cursus sed ex. 
            Proin a fermentum leo. Curabitur lacinia tellus nec felis consectetur vehicula. Proin 
            finibus placerat sagittis</p>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Ryan S')->first()->id,
        ]);

        DB::table('articles')->insert([
            'art_name' => 'Walmart Riots',
            'art_title' => 'Another Year of Black Friday Sales',
            'art_desc' => 'The number of people trampled to death during the opening of black friday 
                        sales in the US totalled 13 so far this year and economists are interpreting this as an indicator that the
                        US economy is improving.',
            'all_pages' => 1,
            'page_id' => 3,
            'cont_id' => 1,
            'art_text' => ' <p>Lorem ipsum dolor sit amet, <b>consectetur adipiscing elit</b>. 
            Curabitur vitae turpis ut erat gravida eleifend. Nulla facilisi. Vivamus non aliquam nisi. 
            Sed ut nibh eget enim luctus dapibus. Quisque eget felis sed ligula fringilla consequat. 
            Nam lacinia ligula enim, ac rhoncus velit malesuada quis. Mauris non imperdiet sem, sed 
            interdum ligula. Fusce enim diam, faucibus in tellus et, vulputate tempus justo. Curabitur 
            et lorem non massa porta dignissim. Sed venenatis cursus tellus et commodo. Etiam a euismod 
            lectus. Aenean urna justo, rutrum ut fringilla ut, convallis eu tellus. Sed interdum vitae 
            lorem vel suscipit. Integer suscipit nunc eu arcu finibus venenatis.</p>

            <p>Aliquam pharetra molestie diam eget tincidunt. 
            In hac habitasse platea dictumst. Donec est dolor, vehicula a rhoncus interdum, 
            sodales sed lacus. Vestibulum leo erat, aliquam quis rutrum sit amet, cursus sed ex. 
            Proin a fermentum leo. Curabitur lacinia tellus nec felis consectetur vehicula. Proin 
            finibus placerat sagittis</p>',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_by' => DB::table('users')->where('name', 'Author Guy')->first()->id,
            'updated_by' => DB::table('users')->where('name', 'Author Guy')->first()->id,
        ]);

    }
}
