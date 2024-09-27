import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TasksTable from "./TasksTable";

export default function Index({ auth, tasks, queryParams = null }) {
  queryParams = queryParams || {};

  return (
    <AuthenticatedLayout
      user={Authenticated.user}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          Tasks
        </h2>
      }
    >
      <Head title="Dashboard" />

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 ">
              <TasksTable queryParams={queryParams} tasks={tasks} />
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
